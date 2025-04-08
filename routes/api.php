<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\Pets\PetController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('Pets', PetController::class);
// Route::apiResource('clients', ClientController::class);

//Client API's
Route::post('/register', [ClientController::class, 'CreateClient']);
Route::post('/login', [ClientController::class, 'LoginClient']);
Route::post('/logout',[ClientController::class, 'LogoutClient']);
Route::get('/clients', [ClientController::class, 'getAllClients']);

//Pets API's
Route::get('/Pets',[PetController::class , 'getAllPets']);

Route::get('/storage/{imageName}', function ($imageName) {
    return response()->file(public_path('images/' . $imageName));
});
