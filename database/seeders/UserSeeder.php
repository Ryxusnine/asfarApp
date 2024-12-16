<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Ganteng',
                'email' => 'admin@local.test',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@local.test',
                'password' => bcrypt('password'),
                'role' => 'user',
            ],
        ];

        User::insert($users);
    }
}
