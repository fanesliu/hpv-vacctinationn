<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller{

    public function loginPage(){
        return view("login.login");
    }

    public function loginInsert(Request $req){
        $input = $req->validate([
            "email"=> "required|email",
            "password"=> "required|min:8",
            ]);

        if(auth::attempt($input)){
            if(Auth::user()->role   == "admin"){
                return redirect()->route(""); //admin punya dashboard
            }else{
                return redirect()->route(""); //user punya dashboard

        }
    }else{
        return redirect()->back()->with('error', 'Input Invalid!');
    }
}

public function registerInsert(Request $req){

    $users = new User;
    $users->name = $req->input('username');
    $users->email = $req->input('email');
    $users->password = Hash::make($req->input('password'));
    $users->role = 'user';
    $users->save();

    return redirect()->route('login');
}

}
