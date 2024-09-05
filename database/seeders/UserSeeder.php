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
                'email' => 'edutech@edutechsolutions.com',
                'password' => Hash::make('edutech123*'),
            ],
        ];

        User::insert($rows);
    }
}
