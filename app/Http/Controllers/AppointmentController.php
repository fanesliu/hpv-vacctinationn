<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Metode untuk mendapatkan tempat
    public function get_place($userID, $vaccineId, $date)
    {
        // Jika date adalah 0, abaikan dan return view tanpa pesan
        if ($date == 0) {
            $places = [];
            $message = "Please Select an Appointment Date";
            return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId', 'date'));
        }

        // Ambil semua tempat yang tersedia berdasarkan tanggal dan vaccineID
        $places = Appointment::with('vaccine')
            ->where('vaccineId', $vaccineId)
            ->where('dateAvailibilityStart', '<=', $date)
            ->where('dateAvailibilityEnd', '>=', $date)
            ->get(['place', 'dateAvailibilityStart', 'dateAvailibilityEnd', 'vaccineId']);
        // dd($places);
        $message = $places->isEmpty() ? 'No place available' : null;

        if (request()->wantsJson()) {
            return response()->json([
                'places' => $places,
                'message' => $message,
            ]);
        }

        return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId', 'date'));
    }

    // Metode untuk melakukan checkout
    public function createTransaction(Request $request)
    {
        Log::info('createTransaction function called', $request->all()); // Log untuk debugging
        // Validasi input
        $request->validate([
            'userId' => 'required|integer',
            'appointmentId' => 'required|integer',
            'finalPrice' => 'required|numeric',
            'paymentType' => 'required|string',
            'appointmentDate' => 'required|date',
            'paymentDate' => 'required|date',
        ]);
        dd($request);
        // Simpan transaksi ke database
        Transaction::create([
            'userId' => $request->userId,
            'appointmentId' => $request->appointmentId,
            'finalPrice' => $request->finalPrice,
            'paymentType' => $request->paymentType,
            'appointmentDate' => $request->appointmentDate,
            'paymentDate' => $request->paymentDate,
        ]);

        return redirect()->back()->with('success', 'Transaction created successfully!');
    }
    // Metode untuk menandai transaksi sebagai pending
    public function pending(Request $request)
    {
        $request->validate([
            'transactionId' => 'required|integer',
        ]);

        $transaction = Transaction::findOrFail($request->transactionId);
        $transaction->status = 'pending';
        $transaction->save();

        return response()->json([
            'message' => 'Transaction status updated to pending',
            'transaction' => $transaction,
        ]);
    }
}
