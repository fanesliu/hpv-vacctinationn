<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function get_place($userID, $vaccineId, $date)
    {
        // Jika date adalah 0, abaikan dan return view tanpa pesan
        if ($date == 0) {
            return view('appointment', ['places' => [], 'message' => null]);
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
        return view('appointment', compact('places', 'message'));
    }
}
