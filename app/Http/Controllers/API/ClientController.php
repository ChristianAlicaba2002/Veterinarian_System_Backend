<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Models\Grooming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Application\Client\RegisterClient;
use App\Models\Adoption;
use App\Models\CheckUp;

class ClientController extends Controller
{
    public function __construct(private RegisterClient $RegisterClient)
    {
        $this->RegisterClient = $RegisterClient;
    }

    public function getAllClientAppointments(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user()->client_id;

        // Filter data based on the logged-in user's ID
        $grooming = Grooming::where('client_id', $user->client_id)->get();
        $checkUp = CheckUp::where('owner_id', $user->client_id)->get();
        $adoption = Adoption::where('client_id', $user->client_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => [
                'grooming' => $grooming,
                'owner_id' => $checkUp,
                'adoption' => $adoption
            ]
        ]);
    }


    public function getAliClients()
    {
        $clients = Client::all();

        if ($clients->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No clients found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Clients retrieved successfully',
            'data' => $clients
        ]);
    }

    function CreateClient(Request $request)
    {
        $sanitized = array_map('trim', $request->all());
        $validator = Validator::make($sanitized, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $client = Client::create([
                'client_id' => $this->GetTheGenerateProductId(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'notes' => 'Whatever notes you want to add',
            ]);


            return response()->json([
                'status' => true,
                'message' => 'Client registered successfully',
                'token' => $client->createToken('Client Token')->plainTextToken,
                'data' => $client
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registration Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function UpdateInformationClient(Request $request)
    {
        $sanitized = array_map('trim', $request->all());
        $validator = Validator::make($sanitized, [
            'client_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $updateData = [
            'client_id' => $request->client_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];

        try {
            DB::table('clients')->where('client_id' , $request->client_id)->update($updateData);

            $client = DB::table('clients')->where('client_id', $request->client_id)->first();

            return response()->json([
                'status' => true,
                'message' => 'Updated Successfully',
                'data' => $client,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Registration Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function LoginClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $client = Client::where('email', $request->input('email'))->first();

        if (!$client || !password_verify($request->input('password'), $client->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Account not found'
            ], 401);
        }

        $user = $client->createToken('Client Token')->plainTextToken;


        return response()->json([
            'status' => true,

            'message' => 'Login successful',
            'token' => $user,
            'data' => $client
        ], 200);
    }

    public function LogoutClient(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function GetTheGenerateProductId(): string
    {
        do {
            $id = random_int(111111, 999999);
            // Check if the generated ID already exists
            $exists = DB::table('clients')->where('client_id', $id)->first();
        } while ($exists !== null); // Ensure the ID is unique

        return $id;
    }
}
