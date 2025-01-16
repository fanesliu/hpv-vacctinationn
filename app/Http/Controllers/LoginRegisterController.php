<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{

    public function loginPage()
    {
        return view("pages.login");
    }

    public function loginInsert(Request $req)
    {
        $messages = [
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!'
        ];

        $input = $req->validate([
            "email" => "required|email",
            "password" => "required|min:8",
        ], $messages);

        if (!str_ends_with($req->email, '@gmail.com')) {
            return redirect()->back()->withErrors([
                'email' => 'Only @gmail.com email addresses are allowed.',
            ]);
        }

        // Add debugging statements
        if (Auth::attempt($input)) {
            $user = Auth::user();
            if ($user->role == "admin") {
                return redirect()->route("admin");
            } else {
                return redirect()->route("homepage");
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid email or password']);
        }
    }

    public function registerPage()
    {
        return view('pages.register'); //cocokin dengan nama frontend nya
    }

    public function registerInsert(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', // Ensure the email ends with @gmail.com
                'unique:users,email',
            ],
            'password' => 'required|min:8',
        ]);

        // Create the user

        $users = new User;
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        $users->password = Hash::make($req->input('password'));
        $users->role = 'user';
        $users->save();

        return redirect()->route('login');
    }
}
