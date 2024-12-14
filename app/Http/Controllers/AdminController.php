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

class AdminController extends Controller
{

    public function deleteAppointment(Appointment $app){
        if ($app) {
            $app->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }

    public function updateSelectedList(Request $req, Appointment $app){
        $validatedData = $req->validate([
            'vaccineId' => 'required|integer|min:1|max:3',
            'place' => 'required|string|max:255',
            'dateAvailibilityStart' => 'required|integer',
            'dateAvailibilityEnd' => 'required|integer',
        ]);
        
        $app->update($validatedData);
        
        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }

    public function addRow(Request $request){

        
            session()->flash('add_row', true);
        

        return redirect()->route('viewAll')->with('success','Berhasil menambahkan baris baru');
    }

    public function storeList(Request $request){
        $request->validate([
            "vaccineId" => 'required|min:1|max:3',
            "place" => 'required',
            "dateAvailibilityStart"=>'required|min:1|max:30',
            "dateAvailibilityEnd"=>'required|min:1|max:30'
        ]);

        Appointment::create([
            'vaccineId' => $request->vaccineId,
            'place' => $request->place,
            'dateAvailibilityStart' => $request->dateAvailibilityStart,
            'dateAvailibilityEnd' => $request->dateAvailibilityEnd
        ]);

        return redirect()->route('viewAll')->with('success', 'Data berhasil ditambahkan.');
    }
    // public function getAllAppointment(){
        
    //     return view('pages.admin.admintest',compact('appointments'));
    // }
    public function adminDashboard()
    {
        $appointment = Appointment::all();
        $user = Auth::user();
        return view('pages.admin.dashboard', compact('user', 'appointment'));
    }

    public function getAllVaccineAndAppointment(){
        $vaccine = Vaccine::all();
        $appointment = Appointment::with('vaccine')->get();
        return view('pages.admin.admintest',compact('vaccine','appointment'));
    }

    public function updatePrice(Request $request)
    {
        $vaccineId = $request->input('vaccine_id');
        $newPrice = $request->input('new_price');

        $vaccine = Vaccine::find($vaccineId);
        if ($vaccine) {
            $vaccine->price = $newPrice;
            $vaccine->save();
            return redirect()->back()->with('success', 'Harga berhasil di update');
        } else {
            return redirect()->back()->with('error', 'Harga gagal di update');
        }
    }

    public function createAppointment()
    {
        return view('pages.admin.createAppointment');
    }

    public function insertAppointment(Request $req)
    {
        $req->validate([
            'vaccine_id' => 'required|min:3',
            'judul_donasi' => 'required|min:5',
            'deskripsi_donasi' => 'required|min:5',
            'target_donasi' => 'required|min:0|max:999999999',
            'photo_donasi' => 'image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);
    }
}
