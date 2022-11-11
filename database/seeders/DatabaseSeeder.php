<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Hasda Damopilii', 'username' => 'hasda', 'password' => Hash::make('password'), 'role' => 'admin'],
            ['name' => 'Kelurahan Hasda', 'username' => 'kelurahan', 'password' => Hash::make('password'), 'role' => 'kelurahan'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
