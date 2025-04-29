<?php

use App\Models\Pets;
use App\Models\Owner;
use App\Models\Client;
use App\Models\CheckUp;
use App\Models\Adoption;
use App\Models\Grooming;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\Pets\PetController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OwnerController;
use App\Models\AdoptionHistory;
use App\Models\PetsHistory;

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
        $owners = Owner::all();
        $pet = Pets::all();
        $total = $pet->count();
        
        return view('Admin.Layouts.Main', compact('total', 'pet','clients','owners'));
    })->name('admin.main')->middleware(PreventBackHistory::class);

    Route::get('/appointments', function(){
        $grooming = Grooming::all();
        $checkUp = CheckUp::all();
        $adoptions = Adoption::all();
        
        return view('Admin.Pages.Appointments', compact('grooming', 'checkUp','adoptions'));
    })->name('appointments')->middleware(PreventBackHistory::class);

    Route::get('/allpets', function () {
        $pet = Pets::all();
        return view('Admin.Pages.PetsInformation', compact('pet'));
    })->name('allpets')->middleware(PreventBackHistory::class);

    Route::get('/petshistory', function () {
        $allPetHistory = PetsHistory::all();
        return view('Admin.Pages.PetsHistory', compact('allPetHistory'));
    })->name('petshistory')->middleware(PreventBackHistory::class);

    Route::get('/addpets', function () {
        return view('Admin.Pages.AddNewPet');
    })->name('addpets')->middleware(PreventBackHistory::class);

    Route::get('/owner', function(){
        $owners = Owner::all();
        return view('Admin.Pages.OwnerPage' , compact('owners'));
    })->name('owner')->middleware(PreventBackHistory::class);

    Route::get('/adoptonhistory', function(){
        $alladoptionHistory = AdoptionHistory::all();
        return view('Admin.Pages.AdoptionHistory' , compact('alladoptionHistory'));
    })->name('adoptonhistory')->middleware(PreventBackHistory::class);

    Route::get('/userinformation', function(){
        $userregister = Client::all();
        return view('Admin.Pages.UserInformation', compact('userregister'));
    })->name('userinformation');

});

//Admin Auth
Route::post('/login', [AdminController::class, 'LoginAdmin'])->name('admin.login');
Route::post('/logout', [AdminController::class, 'LogoutAdmin'])->name('admin.logout');

//Pets Registration
Route::post('/registerpet', [PetController::class, 'registerPet'])->name('admin.registerpet');

//Adoption Pets
Route::post('/rehomed.pets/{id}' , [OwnerController::class , 'ReHomedPets'])->name('rehomend.pets');