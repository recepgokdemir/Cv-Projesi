<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'name' => "Linkedin",
            'link' => "https://www.linkedin.com/in/recep-g%C3%B6kdemir-91326615a/",
            'icon' => "fa fa-linkedin"
        ]);
    }
}
