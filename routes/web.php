<?php

use App\Models\Pets;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pets\PetController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\PreventBackHistory;
use App\Models\Adoption;
use App\Models\CheckUp;
use App\Models\Grooming;

Route::get('/', function () {
    if (Auth::guard('web')->check()) {
        return redirect()->route('admin.main');
    } else {
        return view('Admin.Auth.login');
    }
})->name('login')->middleware(PreventBackHistory::class);

Route::middleware(['auth:web'])->group(function () {
    Route::get('/main', function () {
        $clients = Client::all()->count();
        $pet = Pets::all();
        $total = $pet->count();
        
        return view('Admin.Layouts.Main', compact('total', 'pet','clients'));
    })->name('admin.main')->middleware(PreventBackHistory::class);

    Route::get('/appointments', function(){
        $grooming = Grooming::all();
        $checkUp = CheckUp::all();
        $adoption = Adoption::all();
        
        return view('Admin.Pages.Appointments', compact('grooming', 'checkUp','adoption'));
    })->name('appointments')->middleware(PreventBackHistory::class);

    Route::get('/allpets', function () {
        $pet = Pets::all();
        return view('Admin.Pages.PetsInformation', compact('pet'));
    })->name('allpets')->middleware(PreventBackHistory::class);

    Route::get('/addpets', function () {
        return view('Admin.Pages.AddNewPet');
    })->name('addpets')->middleware(PreventBackHistory::class);
});

//Admin Auth
Route::post('/login', [AdminController::class, 'LoginAdmin'])->name('admin.login');
Route::post('/logout', [AdminController::class, 'LogoutAdmin'])->name('admin.logout');

//Pets Registration
Route::post('/registerpet', [PetController::class, 'registerPet'])->name('admin.registerpet');
