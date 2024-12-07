<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insert([
            [
                'id' => 1,
                'dose' => '1',
                'price' => 200000,
                'description' => 'The initial dose lays the groundwork for immunity against HPV. It primes the immune system to recognize and fight the virus, offering the first layer of defense.'
            ],
            [
                'id' => 2,
                'dose' => '2',
                'price' => 300000,
                'description' => 'Administered a couple of months after the first, this dose strengthens the immune response, ensuring that the body can mount a stronger defense against HPV infections.'
            ],
            [
                'id' => 3,
                'dose' => '3',
                'price' => 400000,
                'description' => 'The final dose in the series is crucial for long-term immunity. It solidifies the body’s defenses, providing comprehensive protection against the most harmful strains of HPV.'
            ]
        ]);
    }
}
