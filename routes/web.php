<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login',function(){
    return view('login.login');
})->name('login');

Route::get('/register',function(){
    return view('register.register');
})->name('register');
