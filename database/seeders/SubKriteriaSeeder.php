<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subs = [
            ['kriteria_id' => 1, 'sub' => 'Lengkap asdkajsdksadkaklsdjkjk asdkajsdksadkaklsdjkjk', 'bobot' => '100'],
            ['kriteria_id' => 1, 'sub' => 'Kurang Lengkap', 'bobot' => '70'],
            ['kriteria_id' => 1, 'sub' => 'Tidak Ada', 'bobot' => '0'],
            ['kriteria_id' => 2, 'sub' => 'Lengkap', 'bobot' => '100'],
            ['kriteria_id' => 2, 'sub' => 'Kurang Lengkap', 'bobot' => '70'],
            ['kriteria_id' => 2, 'sub' => 'Tidak Ada', 'bobot' => '0'],
        ];

        foreach ($subs as $sub) {
            SubKriteria::create($sub);
        }
    }
}
