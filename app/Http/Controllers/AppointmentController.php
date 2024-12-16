<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    // Metode untuk mendapatkan tempat
    public function get_place($vaccineId, $date, $month, $year)
    {
        $dateSekarang = $date;
        $monthSekarang = $month;
        $yearSekarang = $year;

        if ($date == 0) {
            $places = [];
            $message = "Please Select an Appointment Date";
            return view('pages.appointment', compact('places', 'message', 'vaccineId', 'dateSekarang', 'monthSekarang', 'yearSekarang'));
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

        // dd($monthSekarang);

        return view('pages.appointment', compact('places', 'message', 'vaccineId', 'date', 'today', 'dateSekarang', 'monthSekarang', 'yearSekarang'));
    }

    // Metode untuk melakukan checkout
    public function createTransaction(Request $request)
    {
        $dataUser = Auth::user();
        // Validasi input
        $request->validate([
            'appointmentId' => 'required|integer',
            'finalPrice' => 'required|numeric',
            'paymentType' => 'required|string',
            'appointmentDate' => 'required|integer',
            'paymentDate' => 'required|date',
        ]);
        // Ambil data dari request
        $data = $request->all();

        try {
            $appointment = Appointment::findOrFail($data['appointmentId']);
            $transaction = Transaction::create([
                'userId' => $dataUser['userId'], // Ambil userId dari data
                'appointmentId' => $data['appointmentId'],
                'finalPrice' => $data['finalPrice'],
                'paymentType' => $data['paymentType'],
                'appointmentDate' => $data['appointmentDate'],
                'paymentDate' => $data['paymentDate'],
            ]);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $data['finalPrice'],
                ),
                // 'customer_details' => array(
                //     'first_name' => Auth::user()->name,
                //     'email' => Auth::user()->email,
                // )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->snap_token = $snapToken;
            $transaction->save();

            return view('pages.checkout', compact('transaction', 'appointment'));
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


    public function delete(Appointment $id)
    {
        $id->delete();
        return redirect()->route(route: 'index.appointment')
            ->with('success', 'Data berhasil di hapus');
    }
}
