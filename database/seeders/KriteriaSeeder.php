<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriterias = [
            ['kode' => "K1", 'kriteria' => "Status lahan tempat tinggal", 'bobot' => 30],
            ['kode' => "K2", 'kriteria' => "Jenis lantai", 'bobot' => 20],
            ['kode' => "K3", 'kriteria' => "Jenis dinding", 'bobot' => 20],
            ['kode' => "K4", 'kriteria' => "Jenis atap", 'bobot' => 20],
            ['kode' => "K5", 'kriteria' => "Jenis air", 'bobot' => 10],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
