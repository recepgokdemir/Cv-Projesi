<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name' => "Recep Gökdemir",
            'email' => "recepgkd@gmail.com",
            'password' => bcrypt("12345678"),
            'job' => "Software",
            'profile_image' => "imagePath",
            'adress' => "AdresBilgileri"
        ]);
    }
}
