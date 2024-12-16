<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class TransactionController extends Controller
{
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
    public function updateTransaction(Request $request)
    {
        
        $request->validate([
            'transaction_id' => 'required|string',
            'status' => 'required|string',
            'payment_type' => 'required|string',
        ]);
        // Ambil data dari request
        $data = $request->all();
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::where('transactionId', $data['transaction_id'])->first();

        if ($transaction) {
            // Update status dan jenis pembayaran
            $transaction->status = $data['status'];
            $transaction->paymentType = $data['payment_type'];
            $transaction->save();
            alert('Berhasil mengupdate transaksi');
            return redirect()->route('homepage');
            // return response()->json(['success' => true, 'message' => 'Transaction updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Transaction not found.'], 404);
    }
}
