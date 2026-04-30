<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'username' => 'superadmin',
                'role' => 'superadmin',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'role' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ],
            [
                'name' => 'Marketing Communication',
                'username' => 'markom',
                'role' => 'markom',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::updateOrCreate(
                ['username' => $user['username']],
                $user
            );
        }
    }
}
