<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [ClientController::class, 'CreateClient']);
Route::post('/login', [ClientController::class, 'LoginClient']);
Route::post('/logout',[ClientController::class, 'LogoutClient']);
Route::get('/clients', [ClientController::class, 'getAllClients']);

