<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('servicesPage');
});
Route::get('/',[VaccineController::class,'get_allVaccine'])->name("home.view");
