<?php

namespace App\Http\Controllers\API;

use App\Models\Adoption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdoptionController extends Controller
{

    public function CreateAdoption(Request $request, Adoption $adoption)
    {

        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer',
            'first_name'  => 'required|string',
            'last_name'  => 'required|string',
            'email'  => 'required|email',
            'phone_number'  => 'required|string',
            'address'  => 'required|string',
            'pet_id'  => 'required|string',
            'image'  => 'required|string',
            'Pet_Name'  => 'required|string',
            'Age'  => 'required|integer',
            'Species'  => 'required|string',
            'Sex'  => 'required|string',
            'Color'  => 'required|string',
            'Breed'  => 'required|string',
            'Microchip_Number'  => 'required|integer',
            'Neutered_Spay'  => 'required|string',
            'Special_Markings'  => 'required|string',
            'Weight'  => 'required|integer',
            'adoption_date'  => 'required|date_format:Y-m-d',
            'Status'  => 'required|string',
        ]);


        if ($validator->fails()) {
            return Response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }

        $adoptPet = $adoption->create([
            'client_id' => $request->client_id,
            'first_name'  => $request->first_name,
            'last_name'  => $request->last_name,
            'email'  => $request->email,
            'phone_number'  => $request->phone_number,
            'address'  => $request->address,
            'pet_id'  => $request->pet_id,
            'image'  => $request->image,
            'Pet_Name'  => $request->Pet_Name,
            'Age'  => $request->Age,
            'Species'  => $request->Species,
            'Sex'  => $request->Sex,
            'Color'  => $request->Color,
            'Breed'  => $request->Breed,
            'Microchip_Number'  => $request->Microchip_Number,
            'Neutered_Spay'  => $request->Neutered_Spay,
            'Special_Markings'  => $request->Special_Markings,
            'Weight'  => $request->Weight,
            'adoption_date'  => $request->adoption_date,
            'Status'  => $request->Status
        ]);


        return Response()->json([
            'status' => true,
            'message' => 'Thank you for adopt our baby',
            'data' => $adoptPet,
        ], 201);
    }
}
