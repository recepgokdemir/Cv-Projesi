<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'title' => "Web Sitesi",
            'tags' => "php,laravel",
            'about' => "recep web site tasarım",
            'description' => "laravel ile web sitesi geliştirildi.",
            'website' => "www.recep.com",
            'keywords' => "php"
        ]);
    }
}
