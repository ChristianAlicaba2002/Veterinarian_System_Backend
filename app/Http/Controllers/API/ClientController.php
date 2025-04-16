<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Application\Client\RegisterClient;

class ClientController extends Controller
{
    public function __construct(private RegisterClient $RegisterClient)
    {
        $this->RegisterClient = $RegisterClient;
    }

    public function getAliClients()
    {
        $clients = Client::all();
    
        if ($clients->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No clients found'
            ], 404);
        }
    
        return response()->json([
            'status' => true,
            'message' => 'Clients retrieved successfully',
            'data' => $clients
        ], 200);
    }

    function CreateClient(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $client->createToken('Client Token')->plainTextToken,
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
            $id = random_int(111111,999999);
            // Check if the generated ID already exists
            $exists = DB::table('clients')->where('client_id', $id)->first();
        } while ($exists !== null); // Ensure the ID is unique

        return $id;
    }

    // public function GenerateClientId(int $length = 0): string
    // {
    //     $result = substr(bin2hex(random_bytes(ceil($length / 2))), 0, $length);
    //     return $result;
    // }
}
