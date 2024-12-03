<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate{
    public function redirectTo(Request $request){
        if(!$request->expectsJson()){
            return route('login'); //untuk Login sebagai User
        }
    }
}
