<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Middleware\AdminAuthenticate;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('homepage');

Route::get('/register', [LoginRegisterController::class, 'registerPage'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'registerInsert']);
Route::get('/login', [LoginRegisterController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'loginInsert']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');


Route::get('/update-password', [UserController::class, 'editPassword'])->name('editPassword');
Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');

// ---------------------------------------------------------------------------------------------------
// ---------------------------------ADMIN---------------------------------

//Kalo belom login, ga bisa akses route dibawah
Route::middleware(['auth', 'user'])->group(function () {
});

Route::get('/admin-test',[AdminController::class,'getAllVaccine']);
Route::post('/admin-test/update-price',[AdminController::class,'updatePrice'])->name('updateVaccinePrice');

//Route dibawah hanya bisa diakses oleh akun yang punya role admin
Route::middleware(AdminAuthenticate::class)->group(function () {
    Route::get('/admin/create-appointment',[AdminController::class,'createAppointment']);
    Route::get('/admin/create-appointment',[AdminController::class,'insertAppointment']);

    //Account Page
    Route::get('/admin/user/all-accounts', [AdminController::class, 'allAccountsPage']);

    Route::get('/admin',[AdminController::class,'adminDashboard'])->name('admin_dashboard');

    Route::get('/appointment', 'App\Http\Controllers\AppointmentController@index')->name('index.appointment');
    Route::get('/create-appointment', 'App\Http\Controllers\AppointmentController@create')->name('index.create');
    Route::post('/appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('store.appointment');
    Route::post('/appointment/destroy/{id}', 'App\Http\Controllers\AppointmentController@delete')->name('appointment.destroy');


    Route::get('/vaccine', 'App\Http\Controllers\VaccineController@index')->name('vaccine.index');
    Route::get('/vaccine/edit{id}', 'App\Http\Controllers\VaccineController@edit')->name('vaccine.edit');
    Route::put('/vaccine/update{id}', 'App\Http\Controllers\VaccineController@update')->name('vaccine.update');

    //schedule list
});


Route::get('/services', function () {return view('pages.servicesPage');})->name('service.view');
// Route::get('/',[VaccineController::class,'get_allVaccine'])->name("home.view");
Route::get('/appointment/{userID}/{vaccineID}/{date}', [AppointmentController::class, 'get_place'])->name("appointment.view");
Route::get('/pricing/{userID}', [VaccineController::class, 'get_allVaccine'])->name("pricing.view");
Route::view('/aboutus','pages.aboutus')->name("aboutus.view");
