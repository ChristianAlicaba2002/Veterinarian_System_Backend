<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grooming;
use Illuminate\Support\Facades\Validator;

class GroomingController extends Controller
{

    public function getAllAppointGroomings(Grooming $gromming)
    {
        $groomings = $gromming->all();
        return Response()->json([
            'status' => true,
            'message' => 'Grooming appointments retrieved successfully',
            'data' => $groomings
        ]); 
    }

   public function GroomingAppointment(Request $request , Grooming $gromming)
   {
    $validator =  Validator::make($request->all(), [
        'client_id' => 'required|integer',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'pet_name' => 'required|string|max:255',
        'breed' => 'required|string|max:255',
        'service_type' => 'required|string|max:255',
        'appointment_date' => 'required|date_format:Y-m-d',
        'appointment_time' => 'required|date_format:H:i',
        'groomer_name' => 'nullable|string|max:255',
        'notes' => 'nullable|string|max:1000',
    ]);


    if($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    $recievedGrooming = $gromming::create([
        'client_id' => $request->client_id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'pet_name' => $request->pet_name,
        'breed' => $request->breed,
        'service_type' => $request->service_type,
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'groomer_name' => $request->groomer_name,
        'notes' => $request->notes,
    ]);

    return Response()->json([
        'status' => true,
        'message' => 'Grooming appointment created successfully',
        'data' => $recievedGrooming
    ]);

   }
}
