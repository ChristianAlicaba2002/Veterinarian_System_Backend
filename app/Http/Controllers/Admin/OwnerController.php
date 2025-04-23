<?php

namespace App\Http\Controllers\Admin;

use App\Models\Owner;
use App\Models\Adoption;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AdoptionHistory;
use App\Models\Pets;
use App\Models\PetsHistory;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    public function ReHomedPets(Owner $owner, AdoptionHistory $adoptionHistory, $client_id)
    {
        $pet = DB::table('adoption')->where('client_id', $client_id)->first();

        if (!$pet) {
            return redirect()->route('appointments');
        }

        DB::table('adoption')->where('client_id', $client_id)->delete();
        

        $this->RemovePetsRehomed($pet->pet_id);

        $owner->create([
            'client_id' => $pet->client_id,
            'first_name'  => $pet->first_name,
            'last_name'  => $pet->last_name,
            'email'  => $pet->email,
            'phone_number'  => $pet->phone_number,
            'address'  => $pet->address,
            'pet_id'  => $pet->pet_id,
            'image'  => $pet->image,
            'Pet_Name'  => $pet->Pet_Name,
            'Age'  => $pet->Age,
            'Species'  => $pet->Species,
            'Sex'  => $pet->Sex,
            'Color'  => $pet->Color,
            'Breed'  => $pet->Breed,
            'Microchip_Number'  => $pet->Microchip_Number,
            'Neutered_Spay'  => $pet->Neutered_Spay,
            'Special_Markings'  => $pet->Special_Markings,
            'Weight'  => $pet->Weight,
            'adoption_date'  => Carbon::now()->ToDateString(),
            'Status'  => 'Rehomed'
        ]);

        $adoptionHistory->create([
            'client_id' => $pet->client_id,
            'first_name'  => $pet->first_name,
            'last_name'  => $pet->last_name,
            'email'  => $pet->email,
            'phone_number'  => $pet->phone_number,
            'address'  => $pet->address,
            'pet_id'  => $pet->pet_id,
            'image'  => $pet->image,
            'Pet_Name'  => $pet->Pet_Name,
            'Age'  => $pet->Age,
            'Species'  => $pet->Species,
            'Sex'  => $pet->Sex,
            'Color'  => $pet->Color,
            'Breed'  => $pet->Breed,
            'Microchip_Number'  => $pet->Microchip_Number,
            'Neutered_Spay'  => $pet->Neutered_Spay,
            'Special_Markings'  => $pet->Special_Markings,
            'Weight'  => $pet->Weight,
            'adoption_date'  => Carbon::now()->ToDateString(),
            'Status'  => 'Rehomed'
        ]);

        DB::table('pets')
            ->where('pet_id', $pet->pet_id)
            ->update([
                'Status' => 'Rehomed',
                'updated_at' => now()
            ]);

        return redirect()->route('appointments');
    }

    public function RemovePetsRehomed($pet_id)
    {
        $pet = Pets::where('pet_id', $pet_id)->first();

        if(!$pet)
        {
            return Response()->json([
                'status' => false,
                'message' => 'pet not found',
            ]);
        }
        Pets::where('pet_id', $pet_id)->delete();

        PetsHistory::create([
            'pet_id' => $pet->pet_id,
            'Pet_Name' => $pet->Pet_Name,
            'Species' => $pet->Species,
            'Breed' => $pet->Breed,
            'Age' => $pet->Age,
            'Sex' => $pet->Sex,
            'Neutered_Spay' => $pet->Neutered_Spay,
            'Color' => $pet->Color,
            'Weight' => $pet->Weight,
            'Special_Markings' => $pet->Special_Markings,
            'Microchip_Number' => $pet->Microchip_Number,
            'image' => $pet->image,
            'Status' => 'Rehomed',
        ]);

    
    }
}
