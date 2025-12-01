<?php

namespace App\Http\Controllers;

use App\Models\TransportRequest;
use App\Services\SendPulseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransportRequestController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'date' => 'nullable|date|after_or_equal:today',
                'from' => 'nullable|string|max:255',
                'to' => 'nullable|string|max:255',
                'weight' => 'nullable|numeric|min:0|max:100000',
                'length' => 'nullable|numeric|min:0|max:100',
                'width' => 'nullable|numeric|min:0|max:100',
                'height' => 'nullable|numeric|min:0|max:100',
                'freight_type' => 'nullable|string|max:255',
                'load_type' => 'nullable|string|max:255',
            ]);

            // Create the TransportRequest record
            $transport = TransportRequest::create($validated);

            // Send notification via SendPulseService
            $notif = new SendPulseService();
            $msg = $notif->sendVisitorCustomer($transport->phone, $transport->name);

            // Return success response
            return redirect()->back()->with('success', 'Request sent successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Handle all other exceptions (e.g., database errors, SendPulseService errors)
            Log::error('Error in TransportRequest store: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
