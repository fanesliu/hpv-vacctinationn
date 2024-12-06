<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UpdateProfileController extends Controller
{
    //
    public function update(Request $request){
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $user = auth()->user();
        if($user->image && Storage::exists('public/'.$user->image)){
            Storage::delete('public/'.$user->image);
        }

        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $user->image = $path;
        $user->save();

        return back()->with('success', 'Profile picture updated successfully!');
    }
}
