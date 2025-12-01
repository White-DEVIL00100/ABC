<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\SendPulseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'subject' => 'nullable|string|max:255',
                'message' => 'nullable|string',
            ]);

            // Create the TransportRequest record
            $transport = Contact::create($validated);
			
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
            Log::error('Error in Contact store: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
