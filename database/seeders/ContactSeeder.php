<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => "Recep",
            'email' => "Gökdemir",
            'message' => "Bilgi İşlem alanında web tasarım grafik tasarım ve teknik olarak işlemler"
        ]);
    }
}
