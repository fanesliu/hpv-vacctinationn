<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
        return redirect()->route('login');
    }

    public function profile()
    {

        $users = Auth::user();
        return view('pages.profile', compact('users'));
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('pages.edit_profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        // dd($user->id);
        // dd($user->userId);
        // Validate data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'unique:users,email,' . $user->userId . ',userId',
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $user->update(['image' => $imagePath]);
        }

        return redirect()->route('pages.profile')->with('success', 'Profile updated successfully.');
    }

    public function editPassword()
    {
        $id = Auth::user()->userId;
        return view('pages.updatePassword', compact('id'));
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
