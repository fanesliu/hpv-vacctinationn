<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Vaccine;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index(){

        $places = Appointment::all();
        return view("pages.appointment",compact('places'));
    }

    public function create(){
        $vaccine =  Vaccine::all();
        return view('pages.create_appointment',compact('vaccine'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vaccineId' => 'required',
            'place' => 'required',
            'dateAvailibilityStart' => 'required',
            'dateAvailibilityEnd' => 'required|after_or_equal:dateAvailibilityStart',
        ]);

        DB::table('appointments')->insert([
            'vaccineId' => $validated['vaccineId'],
            'place' => $validated['place'],
            'dateAvailibilityStart' => $validated['dateAvailibilityStart'],
            'dateAvailibilityEnd' => $validated['dateAvailibilityEnd'],
        ]);

        return redirect()->route('index.appointment');
    }

    public function get_place($userID, $vaccineId, $date)
    {
        // Jika date adalah 0, abaikan dan return view tanpa pesan
        if ($date == 0) {
            return view('pages.appointment', ['places' => [], 'message' => null]);
        }

        // Ambil semua tempat yang tersedia berdasarkan tanggal dan vaccineID
        $places = Appointment::with('vaccine') // Memuat relasi vaccine
            ->where('vaccineId', $vaccineId)
            ->where('dateAvailibilityStart', '<=', $date)
            ->where('dateAvailibilityEnd', '>=', $date)
            ->get(['place', 'dateAvailibilityStart', 'dateAvailibilityEnd', 'vaccineId']);
        // dd($places);
        // Jika tidak ada tempat yang tersedia, tambahkan pesan ke view
        $message = $places->isEmpty() ? 'No place available' : null;

        // Return ke view
        return view('pages.appointment', compact('places', 'message'));
    }


public function delete(Appointment $id)
{
    $id->delete();
    return redirect()->route(route: 'index.appointment')
            ->with('success','Data berhasil di hapus' );
}
}
