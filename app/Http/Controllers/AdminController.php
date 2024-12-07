<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Vaccine;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Block\Document;

class AdminController extends Controller{

    public function adminDashboard(){
        $appointment = Appointment::all();
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user', 'appointment'));
    }

    public function createAppointment(){
        return view('admin.createAppointment');
    }

    public function insertAppointment(Request $req){
        $req->validate([
            'vaccine_id' => 'required|min:3',
            'judul_donasi' => 'required|min:5',
            'deskripsi_donasi' => 'required|min:5',
            'target_donasi' => 'required|min:0|max:999999999',
            'photo_donasi' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);
    }
}
