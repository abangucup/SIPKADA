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
            ['kriteria_id' => 1, 'sub' => 'Lengkap', 'subbobot' => '100'],
            ['kriteria_id' => 1, 'sub' => 'Kurang Lengkap', 'subbobot' => '50'],
            ['kriteria_id' => 1, 'sub' => 'Tidak Ada', 'subbobot' => '0'],
            ['kriteria_id' => 2, 'sub' => 'Miskin', 'subbobot' => '100'],
            ['kriteria_id' => 2, 'sub' => 'Berkecukupan', 'subbobot' => '70'],
            ['kriteria_id' => 2, 'sub' => 'Sederhana', 'subbobot' => '20'],
            ['kriteria_id' => 3, 'sub' => 'Sangat Disiplin', 'subbobot' => '100'],
            ['kriteria_id' => 3, 'sub' => 'Kurang DIsiplin', 'subbobot' => '60'],
            ['kriteria_id' => 3, 'sub' => 'TIdak Disiplin', 'subbobot' => '10'],
        ];

        foreach ($subkriterias as $subkriteria) {
            Subkriteria::create($subkriteria);
        }
    }
}
