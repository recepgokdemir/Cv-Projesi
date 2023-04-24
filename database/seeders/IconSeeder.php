<?php

namespace Database\Seeders;

use App\Models\Icons;
use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Icons::create([
            'icon_name' => "Linkedin",
            'icon_class' => '<i class="fa fa-linkedin"></i>'
            ]);
        Icons::create([
            'icon_name' => "Facebook",
            'icon_class' => '<i class="fa fa-facebook"></i>'
        ]);
        Icons::create([
            'icon_name' => "Twitter",
            'icon_class' => '<i class="fa fa-twitter"></i>'
        ]);
        Icons::create([
            'icon_name' => "Github",
            'icon_class' => '<i class="fa fa-github"></i>'
        ]);
    }
}
