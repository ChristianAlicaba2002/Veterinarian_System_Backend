<?php

namespace App\Http\Controllers\Pets;

use App\Models\Pets;
use Illuminate\Http\Request;
use App\Application\Pet\RegisterPet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PetController extends Controller
{
    public function __construct(private RegisterPet $registerPet)
    {
        return $this->registerPet = $registerPet;
    }

    public function getAllPets()
    {
        $pets = Pets::all();
        return Response()->json([
            'Status' => true,
            'Message' => 'Retrieve Data Successully',
            'data' => $pets
        ],200);
    }

    public function registerPet(Request $request)
    {
        Validator::make($request->all(),[
            'Pet_Name' => 'required|string|max:255',
            'Species' => 'required|string|max:255',
            'Breed' => 'required|string|max:255',
            'Age' => 'required|string|max:255',
            'Sex' => 'required|string|max:255',
            'Neutered_Spay' => 'required|string|max:255',
            'Color' => 'required|string|max:255',
            'Weight' => 'required|string|max:255',
            'Special_Markings' => 'required|string|max:255',
            'Microchip_Number' => 'required|string|max:255',
            'Image' => 'nullable|image',
            'Status' => 'required|string|max:255',
        ]);

        $data = [];

        if($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['Image'] = $filename;
        }


        $pet_id = $this->GetTheGeneratePetId();

        $pet = $this->registerPet->CreatePet(
            $pet_id,
            $request->Pet_Name,
            $request->Species,
            $request->Breed,
            $request->Age,
            $request->Sex,
            $request->Neutered_Spay,
            $request->Color,
            $request->Weight,
            $request->Special_Markings,
            $request->Microchip_Number,
            $data['Image'],
            $request->Status,
        );   

        return redirect('/main')->with('success' , 'Register Successfully');
    }

    public function GetTheGeneratePetId(): string
    {
        do {
            $id = $this->GenerateRandomPetId(6);
            $exists = Pets::where('pet_id', $id)->first();
        } while ($exists !== null); // Ensure the ID is unique

        return $id;
    }

    public function GenerateRandomPetId(int $length = 0): string
    {
        $result = random_int(111111,999999);
        return $result;
    }


    public function PetData(Pets $pet ,  $pet_id)
    {
        $petData = $pet::where('pet_id' , $pet_id)->get();

        if(!$petData)
        {
            return Response()->json([
                'status' => false,
                'message' => 'Pet not found',
            ]);
        }


        return Response()->json([
            'status' => true,
            'message' => 'Retrived Data',
            'data' => $petData
        ],201);
    }

}
