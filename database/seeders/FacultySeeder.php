<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Faculty',
            'email' => 'faculty@gmail.com',
            'user_type' => 'Somaiya',
            'rollno' => '100',
            'password' => bcrypt('password@1'),
        ])->assignRole('faculty');
    }
}
