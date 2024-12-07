<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the seeders in the appropriate order
        $this->call([
            UsersSeeder::class,
            VaccinesSeeder::class,
            AppointmentsSeeder::class,
            TransactionsSeeder::class,
        ]);
    }
}
