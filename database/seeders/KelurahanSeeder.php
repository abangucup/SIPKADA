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
            ['nama' => 'Kelurahan 1', 'lokasi' => 'Sepanjang Kelurahan 1'],
            ['nama' => 'Kelurahan 2', 'lokasi' => 'Sepanjang Kelurahan 2'],
        ];

        foreach ($kelurahans as $kelurahan) {
            Kelurahan::create($kelurahan);
        }
    }
}
