<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Storage;


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

    public function profile(){

        $users = Auth::user();
        $histories = Transaction::where('userId', $users->userId)->paginate(5);

        return view('pages.profile', compact('users', 'histories'));
    }

    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Mendapatkan user yang sedang login
        $user = Auth::user();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            
            // Membaca isi file dan mengubahnya ke base64
            $contents = file_get_contents($file->getRealPath());
            $base64 = base64_encode($contents);
            $mimeType = $file->getMimeType();
            $base64Data = 'data:' . $mimeType . ';base64,' . $base64;
    
            // Hapus gambar lama dari database jika ada
            if ($user->image) {
                $user->image = null; // Jika ingin menghapus gambar lama
            }
    
            // Simpan gambar base64 ke database
            $user->image = $base64Data;
            $user->save();
        }
    
        // Redirect dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profile image updated successfully.');
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
