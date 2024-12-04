<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('homepage');

Route::get('/register', [LoginRegisterController::class, 'registerPage'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'registerInsert']);
Route::get('/login', [LoginRegisterController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'loginInsert']);
Route::get('/logout', [UserController::class, 'logout']);


//Kalo belom login, ga bisa akses route dibawah
Route::middleware(['auth', 'user'])->group(function () {


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
