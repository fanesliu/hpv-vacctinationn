<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        return view('pages.home', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('pages.login');
    }
    
    public function profile(){

        $users = Auth::user();
        return view('pages.profile', compact('users'));
    }
    public function editProfile(){

        $users = Auth::user();
        return view('pages.edit_profile');
    }
    public function updateProfile(Request $request, string $id)
    {
        // validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 
                'unique:users,email',
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image,
        ]);

        return redirect()->route('pages.profile')->with('success', 'Profile updated successfully.');
    }

    public function editPassword(){
        return view('pages.updatePassword');
    }

public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->old_password, $user->password)) {
        return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
    }

    try {
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password updated successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Failed to update password: ' . $e->getMessage()]);
    }
}

}