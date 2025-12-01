<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class VisitorController extends Controller
{

    public function transport(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'job_number' => 'required|string',
            'container_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }


        // Get query parameters
        $jobNumber = $request->query('job_number');
        $containerNumber = $request->query('container_number');

        // Make API request
        $apiResponse = Http::get('https://app.abclogistic.com/api/fetchTransportData', [
            'job_number' => $jobNumber,
            'container_number' => $containerNumber,
        ]);

        if ($apiResponse->successful()) {
            $data = $apiResponse->json();

            if ($data['success']) {
                return response()->json([
                    'success' => true,
                    'gpsPoints' => $data['gpsPoints'],
                    'info' => $data['info'],
                  	
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => $data['message'] ?? 'No data found',
                ], 404);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch data from API',
            ], 500);
        }
        try {
        } catch (\Exception $e) {
            Log::error('Error in VisitorController::transport: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Server error occurred',
            ], 500);
        }
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'gender' => 'nullable|string|in:Mr,Ms,Mrs,Dr,Prof,Eng,Other',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        // Create a new user profile

        UserProfile::create([
            'gender' => $request->gender,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'country' => $request->country,
            'city' => $request->city,
            'job_title' => $request->job_title,
            'company' => $request->company,
        ]);
        try {
            return redirect()->route('games_list')->with('success', 'Request sent successfully!');
        } catch (\Exception $e) {
            // Return error response if something goes wrong
            return redirect()->back()->with('error', 'Something went Wrong');
        }
    }
}
