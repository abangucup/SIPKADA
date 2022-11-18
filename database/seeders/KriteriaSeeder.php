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
            ['kode' => "C1", 'nama' => "Kepedudukan", 'bobot' => 70, 'jenis' => 'cost', 'keterangan' => 'kependudukan jenis cost'],
            ['kode' => "C2", 'nama' => "Kemiskinan", 'bobot' => 80, 'jenis' => 'benefit', 'keterangan' => 'kependudukan jenis cost'],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
