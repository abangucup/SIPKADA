<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy Data Kelurahan
        $kelurahans = [
            ['nama' => 'Kota Bolmut', 'lokasi' => 'Jalan Kota Bolmut'],
            ['nama' => 'Kabupaten Bolmut', 'lokasi' => 'Jalan Kabupaten Bolmut'],
        ];

        foreach ($kelurahans as $kelurahan) {
            Kelurahan::create($kelurahan);
        }
    }
}
