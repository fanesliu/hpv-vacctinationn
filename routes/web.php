<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserController::class, 'home'])->name('homepage');

Route::get('/register', [LoginRegisterController::class, 'registerPage'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'registerInsert']);
Route::get('/login', [LoginRegisterController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'loginInsert']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/profile',function(){
    return view('pages.profile');
})->name('profile');


// ---------------------------------------------------------------------------------------------------
// ---------------------------------ADMIN---------------------------------

//Kalo belom login, ga bisa akses route dibawah
Route::middleware(['auth', 'user'])->group(function () {
    Route::post('/profile', [UpdateProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'admin'])->group(function (){

    Route::get('/admin',[AdminController::class,'adminDashboard'])->name('admin_dashboard');
    Route::get('/admin/create-appointment',[AdminController::class,'createAppointment']);
    Route::get('/admin/create-appointment',[AdminController::class,'insertApoointment']);

    //Account Page
    Route::get('/admin/user/all-accounts', [AdminController::class, 'allAccountsPage']);

    //schedule list
    Route::get('/appointment', 'App\Http\Controllers\AppointmentController@index')->name('index.index');
    route::get('/appointment/create', 'App\Http\Controllers\AppointmentController@create')->name('index.create');
    route::post('/appointment/store', action: 'App\Http\Controllers\AppointmentController@store')->name('index.store');
    route::get('/appointment/edit{id}', 'App\Http\Controllers\AppointmentController@edit')->name('index.edit');
    route::put('/appointment/update{id}', 'App\Http\Controllers\AppointmentController@update')->name('index.update');
});

Route::get('/services', function () {
    return view('pages.servicesPage');
});
// Route::get('/',[VaccineController::class,'get_allVaccine'])->name("home.view");
Route::get('/appointment/{userID}/{vaccineID}/{date}',[AppointmentController::class,'get_place'])->name("appointment.view");
Route::get('/pricing/{userID}',[VaccineController::class,'get_allVaccine'])->name("pricing.view");