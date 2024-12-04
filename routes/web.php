<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('pages.servicesPage');
});
// Route::get('/',[VaccineController::class,'get_allVaccine'])->name("home.view");
Route::get('/appointment/{userID}/{vaccineID}/{date}', [AppointmentController::class, 'get_place'])->name("appointment.view");
Route::get('/pricing/{userID}', [VaccineController::class, 'get_allVaccine'])->name("pricing.view");
