<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Middleware\AdminAuthenticate;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/register', [LoginRegisterController::class, 'registerPage'])->name('register');
Route::post('/register', [LoginRegisterController::class, 'registerInsert']);
Route::get('/login', [LoginRegisterController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'loginInsert']);
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// ---------------------------------USER---------------------------------
Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/', [UserController::class, 'home'])->name('homepage');
    Route::get('/services', function () {
        return view('pages.servicesPage');
    })->name('service.view');
    Route::get('/appointment/{userID}/{vaccineID}/{date}', [AppointmentController::class, 'get_place'])->name("appointment.view");
    Route::get('/pricing/{userID}', [VaccineController::class, 'get_allVaccine'])->name("pricing.view");
    Route::view('/aboutus', 'pages.aboutus')->name("aboutus.view");
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/update-password', [UserController::class, 'editPassword'])->name('editPassword');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
});

// ---------------------------------ADMIN---------------------------------
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'getAllVaccine'])->name('admin');
    Route::post('/admin', [AdminController::class, 'getAllVaccine']);
    Route::post('/admin/update-price', [AdminController::class, 'updatePrice'])->name('updateVaccinePrice');
    Route::post('/createNewAppointment', [AdminController::class, 'createNewAppointment'])->name('createNewAppointment');
    Route::post('/updateAppointment', [AdminController::class, 'updateAppointment'])->name('updateAppointment');
    Route::post('/deleteAppointment', [AdminController::class, 'deleteAppointment'])->name('deleteAppointment');
});
