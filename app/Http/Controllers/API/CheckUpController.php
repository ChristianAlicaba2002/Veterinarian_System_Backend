<?php

namespace App\Http\Controllers\API;

use App\Models\CheckUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Validator;

class CheckUpController extends Controller
{

    public function getAllCheckUpAppointments(CheckUp $checkUps)
    {
        $checkUps = CheckUp::all();

        return Response()->json([
            'status' => true,
            'message' => 'CheckUp Appointments Retrieved Successfully',
            'data' => $checkUps
        ]);
    }


    public function CreateCheckUpAppointment(Request $request, CheckUp  $checkUp)
    {
        $validator = Validator::make($request->all(), [
            'owner_id' => 'required', 
            'owner_fullname' => 'required|string',
            'owner_address' => 'required|string',
            'owner_email' => 'required|email',
            'owner_phoneNumber' => 'required|string',
            'pet_name' => 'required|string',
            'breed' => 'required|string',
            'weight' => 'required|string',
            'species' => 'required|string',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'appointment_date' => 'required|date_format:Y-m-d',
            'checkup_type' => 'required|string',
            'symptoms' => 'required|string',
            'preferred_vet' => 'required|string',
        ]);

        if($validator->fails())
        {
            return Response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors()
            ]);
        }

        $checkUp->create([
            'owner_id' => $request->owner_id,
            'owner_fullname' => $request->owner_fullname,
            'owner_address' => $request->owner_address,
            'owner_email' => $request->owner_email,
            'owner_phoneNumber' => $request->owner_phoneNumber,
            'pet_name' => $request->pet_name,
            'breed' => $request->breed,
            'weight' => $request->weight,
            'species' => $request->species,
            'age' => $request->age,
            'sex' => $request->sex,
            'appointment_date' => $request->appointment_date,
            'checkup_type' => $request->checkup_type,
            'symptoms' => $request->symptoms,
            'preferred_vet' => $request->preferred_vet,
            
        ]);

        return Response()->json([
            'status' => true,
            'message' => 'CheckUp Appointment Created Successfully',
            'data' => $checkUp
        ]);
    }
}
