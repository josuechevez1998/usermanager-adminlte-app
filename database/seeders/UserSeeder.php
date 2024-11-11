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
     */
    public function run(): void
    {
        $rows = [
            [
                'name' => 'Edutech User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123*'),
                'state' => 1
            ],
        ];

        User::insert($rows);
    }
}
