<?php

namespace Database\Seeders;

use App\Models\Penerima;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy Data Penerima
        $penerimas = [
            ['nama' => 'Hasda', 'nik' => '7501010101010101', 'jk' => 'pria', 'alamat' => 'Bolmut Selatan', 'kelurahan_id' => 1],
            ['nama' => 'Alif', 'nik' => '7501010101010102', 'jk' => 'pria', 'alamat' => 'Bolmut Selatan', 'kelurahan_id' => 1],
            ['nama' => 'Abdul', 'nik' => '7501010101010103', 'jk' => 'pria', 'alamat' => 'Bolmut Selatan', 'kelurahan_id' => 1],
            ['nama' => 'Rivo', 'nik' => '7501010101010104', 'jk' => 'wanita', 'alamat' => 'Bolmut Utara', 'kelurahan_id' => 2],
            ['nama' => 'Fikal', 'nik' => '7501010101010105', 'jk' => 'pria', 'alamat' => 'Bolmut Utara', 'kelurahan_id' => 2],
        ];

        foreach ($penerimas as $penerima) {
            Penerima::create($penerima);
        }
    }
}
