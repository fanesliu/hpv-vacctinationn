<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'transactionId' => 7,
                'userId' => 1,
                'appointmentId' => 1,
                'finalPrice' => 220000,
                'paymentType' => 'qris',
                'paymentDate' => '2024-01-02',
                'appointmentDate' => '15',
                'status' => 'pending'
            ],
            [
                'transactionId' => 8,
                'userId' => 1,
                'appointmentId' => 5,
                'finalPrice' => 320000,
                'paymentType' => 'transfer',
                'paymentDate' => '2024-02-09',
                'appointmentDate' => '1',
                'status' => 'pending'
            ],
            [
                'transactionId' => 9,
                'userId' => 1,
                'appointmentId' => 9,
                'finalPrice' => 420000,
                'paymentType' => 'virtual account',
                'paymentDate' => '2024-02-21',
                'appointmentDate' => '30',
                'status' => 'pending'
            ]
        ]);
    }
}
