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
            $places = []; // Atau Anda bisa mendefinisikan variabel lain jika diperlukan
            $message = "Please Select an Appointment Date";
            return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId'));
        }

        // Ambil semua tempat yang tersedia berdasarkan tanggal dan vaccineID
        $places = Appointment::with('vaccine') // Memuat relasi vaccine
            ->where('vaccineId', $vaccineId)
            ->where('dateAvailibilityStart', '<=', $date)
            ->where('dateAvailibilityEnd', '>=', $date)
            ->get(['place', 'dateAvailibilityStart', 'dateAvailibilityEnd', 'vaccineId']);

        // Jika tidak ada tempat yang tersedia, tambahkan pesan
        $message = $places->isEmpty() ? 'No place available' : null;

        // Periksa apakah request berasal dari AJAX atau fetch()
        if (request()->wantsJson()) {
            return response()->json([
                'places' => $places,
                'message' => $message,
            ]);
        }

        // Jika bukan AJAX, return view
        return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId'));
    }
}
