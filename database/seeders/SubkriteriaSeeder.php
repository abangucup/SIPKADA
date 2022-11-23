<?php

namespace Database\Seeders;

use App\Models\Subkriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subkriterias = [
            ['kriteria_id' => 1, 'sub' => 'Lengkap', 'bobot' => '100'],
            ['kriteria_id' => 1, 'sub' => 'Kurang Lengkap', 'bobot' => '50'],
            ['kriteria_id' => 1, 'sub' => 'Tidak Ada', 'bobot' => '0'],
            ['kriteria_id' => 2, 'sub' => 'Miskin', 'bobot' => '100'],
            ['kriteria_id' => 2, 'sub' => 'Berkecukupan', 'bobot' => '70'],
            ['kriteria_id' => 2, 'sub' => 'Sederhana', 'bobot' => '20'],
            ['kriteria_id' => 3, 'sub' => 'Sangat Disiplin', 'bobot' => '100'],
            ['kriteria_id' => 3, 'sub' => 'Kurang DIsiplin', 'bobot' => '60'],
            ['kriteria_id' => 3, 'sub' => 'TIdak Disiplin', 'bobot' => '10'],
        ];

        foreach ($subkriterias as $subkriteria) {
            Subkriteria::create($subkriteria);
        }
    }
}
