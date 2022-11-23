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
            ['kode' => "C1", 'nama' => "Kepedudukan Kepedudukan Kepedudukan Kepedudukan Kepedudukan", 'bobot' => 70, 'jenis' => 'cost', 'keterangan' => 'kependudukan jenis cost'],
            ['kode' => "C2", 'nama' => "Kemiskinan", 'bobot' => 80, 'jenis' => 'benefit', 'keterangan' => 'kependudukan jenis benefit kependudukan jenis benefitkependudukan jenis benefit kependudukan jenis benefit kependudukan jenis benefitkependudukan jenis benefit kependudukan jenis benefit'],
            ['kode' => "C3", 'nama' => "Disiplin", 'bobot' => 100, 'jenis' => 'cost', 'keterangan' => 'Penentu Penerima Mendapatkan Bantuan'],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
