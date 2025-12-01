<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use App\Services\SendPulseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function store(Request $request)
    {

        // Validate request
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:255',
            'identity_number' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'marital_status' => 'nullable|in:single,married',
            'educational_level' => 'nullable|string|max:100',
            'specialization' => 'nullable|string|max:100',
            'field' => 'nullable|string|max:100',
            'section_id' => 'nullable|in:hr,operation,workshop',
            'cv' => "nullable|mimes:pdf|max:10000", // Max 2MB
            'building_number' => 'nullable|integer',
            'additional_number' => 'nullable|integer',
            'street' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'district' => 'nullable|string|max:100',
            'postal_code' => 'nullable|integer',
            'skills' => 'nullable|string',
        ]);

        if (filled($request->cv)) {
            $file = $request->cv;
            $timestamp = now()->getTimestampMs();
            $customFileName = $timestamp . '.' . $file->getClientOriginalExtension();
            $file->move('documents/', $customFileName);
            $customFileName = 'documents/' . $customFileName;
            $validated['cv'] = $customFileName;
        }

        // Store data
        $job = Employment::create($validated);
        // Send notification via SendPulseService
        $notif = new SendPulseService();
        $msg = $notif->sendVisitorEmployer($job->contact_number, $job->name);

        // Return success response
        return redirect()->back()->with('success', 'Request sent successfully!');
        try {
        } catch (\Exception $e) {
            // Handle all other exceptions (e.g., database errors, SendPulseService errors)
            Log::error('Error in Employment store: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
