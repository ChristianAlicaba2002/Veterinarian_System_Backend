<?php

use App\Http\Controllers\API\AdoptionController;
use App\Http\Controllers\API\CheckUpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pets\PetController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\GroomingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Client API's
Route::post('/register', [ClientController::class, 'CreateClient']);
Route::post('/login', [ClientController::class, 'LoginClient']);
Route::post('/logout',[ClientController::class, 'LogoutClient']);
Route::get('/clients', [ClientController::class, 'getAllClients']);

//Pets API's
Route::get('/Pets',[PetController::class , 'getAllPets']);
Route::get('/Pets/{pet_id}',[PetController::class , 'PetData']);

Route::get('/storage/{imageName}', function ($imageName) {
    return response()->file(public_path('images/' . $imageName));
});

//Grooming Appointment API's
Route::post('/grooming', [GroomingController::class, 'GroomingAppointment']);
Route::get('/grooming', [GroomingController::class, 'getAllAppointGroomings']);
//CheckUps Appointment API's
Route::post('/checkUp' , [CheckUpController::class , 'CreateCheckUpAppointment']);
Route::get('/checkUp' , [CheckUpController::class , 'getAllCheckUpAppointments']);

//Adoption Appointment API's
Route::post('/adoption',[AdoptionController::class , 'CreateAdoption']);