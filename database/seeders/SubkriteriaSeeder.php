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
            ['kriteria_id' => 1, 'sub' => 'Milik sendiri', 'subbobot' => '90'],
            ['kriteria_id' => 1, 'sub' => 'Warisan', 'subbobot' => '80'],
            ['kriteria_id' => 1, 'sub' => 'Numpang / Sewa', 'subbobot' => '70'],
            ['kriteria_id' => 2, 'sub' => 'Tanah / bambu kayu', 'subbobot' => '90'],
            ['kriteria_id' => 2, 'sub' => 'Semen', 'subbobot' => '80'],
            ['kriteria_id' => 2, 'sub' => 'Keramik', 'subbobot' => '70'],
            ['kriteria_id' => 3, 'sub' => 'Anyaman bambu / papan', 'subbobot' => '90'],
            ['kriteria_id' => 3, 'sub' => 'Seng / tripleks', 'subbobot' => '80'],
            ['kriteria_id' => 3, 'sub' => 'Tembok / beton', 'subbobot' => '70'],
            ['kriteria_id' => 4, 'sub' => 'Seng / injuk', 'subbobot' => '90'],
            ['kriteria_id' => 4, 'sub' => 'Genteng / asbes', 'subbobot' => '80'],
            ['kriteria_id' => 4, 'sub' => 'Beton', 'subbobot' => '70'],
            ['kriteria_id' => 5, 'sub' => 'Sumur', 'subbobot' => '90'],
            ['kriteria_id' => 5, 'sub' => 'PDAM', 'subbobot' => '80'],
        ];

        foreach ($subkriterias as $subkriteria) {
            Subkriteria::create($subkriteria);
        }
    }
}
