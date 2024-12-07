<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'id' => 1,
                'vaccineId' => 1,
                'place' => 'Rumah Sakit Premiere',
                'dateAvailibilityStart' => 1,
                'dateAvailibilityEnd' => 7,
            ],
            [
                'id' => 2,
                'vaccineId' => 2,
                'place' => 'Hermina',
                'dateAvailibilityStart' => 1,
                'dateAvailibilityEnd' => 7,
            ],
            [
                'id' => 3,
                'vaccineId' => 3,
                'place' => 'Budhi Asih',
                'dateAvailibilityStart' => 1,
                'dateAvailibilityEnd' => 7,
            ],
            [
                'id' => 4,
                'vaccineId' => 1,
                'place' => 'Rumah Sakit Siloam MRCC',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 16,
            ],
            [
                'id' => 5,
                'vaccineId' => 2,
                'place' => 'RSUP Fatmawati',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 16,
            ],
            [
                'id' => 6,
                'vaccineId' => 3,
                'place' => 'Rumah Sakit Pondok Indah',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 16,
            ],
            [
                'id' => 7,
                'vaccineId' => 1,
                'place' => 'Rumah Sakit Mayapada Jakarta',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 22,
            ],
            [
                'id' => 8,
                'vaccineId' => 2,
                'place' => 'Rumah Sakit Mitra Keluarga',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 22,
            ],
            [
                'id' => 9,
                'vaccineId' => 3,
                'place' => 'Primaya Hospital Cikini',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 22,
            ],
            [
                'id' => 10,
                'vaccineId' => 1,
                'place' => 'Rumah Sakit EMC Alam Sutera',
                'dateAvailibilityStart' => 8,
                'dateAvailibilityEnd' => 30,
            ],
            [
                'id' => 11,
                'vaccineId' => 2,
                'place' => 'RSUD Bunda Jakarta',
                'dateAvailibilityStart' => 1,
                'dateAvailibilityEnd' => 30,
            ],
            [
                'id' => 12,
                'vaccineId' => 3,
                'place' => 'Rumah Sakit Umum Jakarta Medistra',
                'dateAvailibilityStart' => 1,
                'dateAvailibilityEnd' => 30,
            ],
        ]);
    }
}
