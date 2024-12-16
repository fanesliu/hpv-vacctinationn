<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccineController;
use App\Http\Middleware\AdminAuthenticate;
use App\Models\Vaccine;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;



Route::get('/', [UserController::class, 'home'])->name('homepage');
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
    Route::post('/create-transaction', [AppointmentController::class, 'createTransaction'])->name('createTransaction');
    Route::get('/pricing', [VaccineController::class, 'get_allVaccine'])->name("pricing.view");
    Route::view('/aboutus', 'pages.aboutus')->name("aboutus.view");
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/update-password', [UserController::class, 'editPassword'])->name('editPassword');
    Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
    Route::view('/aboutus', 'pages.aboutus')->name("aboutus.view");
    Route::post('/create-transaction', [AppointmentController::class, 'createTransaction'])->name('createTransaction');
    Route::view('/checkout', 'pages.checkout')->name('checkout');
    Route::post('/update-transaction', [TransactionController::class, 'updateTransaction'])->name('updateTransaction');
});

// ---------------------------------ADMIN---------------------------------
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'getAllVaccineAndAppointment'])->name('admin');
    Route::post('/admin', [AdminController::class, 'getAllVaccineAndAppointment']);

    // Tambahan winsen
    Route::delete('/admin-test/delete/{app}', [AdminController::class, 'deleteAppointment'])->name('deleteAppointment');
    Route::post('/admin/update-selected-list/{app}', [AdminController::class, 'updateSelectedList'])->name('updateSelectedSchedule');
    Route::get('/insert/add-row', [AdminController::class, 'addRow'])->name('addRow');
    Route::post('/admin/update-price', [AdminController::class, 'updatePrice'])->name('updateVaccinePrice');
    Route::post('/admin/insert-data', [AdminController::class, 'storeList'])->name('storeList');
});
