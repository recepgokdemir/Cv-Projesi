<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'company_name' => "Sezer Tarım",
            'task_name' => "Bilgi İşlem",
            'description' => "Bilgi İşlem alanında web tasarım grafik tasarım ve teknik olarak işlemler",
            'date' => "2013-205"
        ]);
    }
}
