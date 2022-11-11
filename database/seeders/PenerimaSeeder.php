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
            ['nama' => 'Penerima Hasda 1', 'nik' => '75010101010101', 'jk' => 'pria', 'alamat' => 'Paguyaman', 'kelurahan_id' => 1],
            ['nama' => 'Penerima Hasda 2', 'nik' => '75020202020202', 'jk' => 'wanita', 'alamat' => 'Paguyaman Sabalah', 'kelurahan_id' => 2],
        ];

        foreach ($penerimas as $penerima) {
            Penerima::create($penerima);
        }
    }
}
