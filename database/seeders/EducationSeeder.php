<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'education_year' => "2015-2019",
            'school_name' => "Mehmet Akif Ersoy Üniversitesi",
            'department' => "Software Developer",
            'degree' => "3"
            ]);
    }
}
