<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy Data User
        $users = [
            ['name' => 'Hasda Damopilii', 'username' => 'hasda', 'password' => Hash::make('password'), 'role' => 'admin'],
            ['name' => 'Kelurahan Hasda 1', 'username' => 'kelurahan1', 'password' => Hash::make('password'), 'role' => 'kelurahan', 'kelurahan_id' => 1],
            ['name' => 'Kelurahan Hasda 2', 'username' => 'kelurahan2', 'password' => Hash::make('password'), 'role' => 'kelurahan', 'kelurahan_id' => 2],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
