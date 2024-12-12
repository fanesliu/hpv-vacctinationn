<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Metode untuk mendapatkan tempat
    public function get_place($userID, $vaccineId, $date)
    {
        if ($date == 0) {
            $places = [];
            $message = "Please Select an Appointment Date";
            return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId', 'date'));
        }
        $today = Carbon::now()->format('Y-m-d');
        // Ambil semua tempat yang tersedia berdaan tanggal dan vaccineID
        $places = Appointment::with('vaccine')
            ->where('vaccineId', $vaccineId)
            ->where('dateAvailibilityStart', '<=', $date)
            ->where('dateAvailibilityEnd', '>=', $date)
            ->get(['appointmentId', 'place', 'dateAvailibilityStart', 'dateAvailibilityEnd', 'vaccineId',]);
        //  dd($places);
        $message = $places->isEmpty() ? 'No place available' : null;

        if (request()->wantsJson()) {
            return response()->json([
                'places' => $places,
                'message' => $message,
            ]);
        }

        return view('pages.appointment', compact('places', 'message', 'userID', 'vaccineId', 'date','today'));
    }

    // Metode untuk melakukan checkout
    public function createTransaction(Request $request)
{
    // Validasi input
    $request->validate([
        'userId' => 'required|integer', // Pastikan userId ada dan merupakan integer
        'appointmentId' => 'required|integer',
        'finalPrice' => 'required|numeric',
        'paymentType' => 'required|string',
        'appointmentDate' => 'required|integer',
        'paymentDate' => 'required|date',
    ]);

    // Ambil data dari request
    $data = $request->all();
    // dd($data);

    // Debugging: Lihat semua data yang dikirim
    // dd($data); // Uncomment ini jika Anda ingin melihat data yang dikirim

    // Simpan transaksi ke database
    try {
        Transaction::create([
            'userId' => $data['userId'], // Ambil userId dari data
            'appointmentId' => $data['appointmentId'],
            'finalPrice' => $data['finalPrice'],
            'paymentType' => $data['paymentType'],
            'appointmentDate' => $data['appointmentDate'],
            'paymentDate' => $data['paymentDate'],
        ]);

        return redirect()->back()->with('success', 'Transaction created successfully!');
    } catch (\Exception $e) {
        // Tangani kesalahan jika terjadi saat menyimpan
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage());
    }
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
