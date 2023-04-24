<?php

namespace Database\Seeders;

use App\Models\Integration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntegrationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Integration::create([
           "name" => 'Google Recaptcha',
           "status" => 1,
            "config" => json_encode([
                'version' => 'v2',
                'secret_key' => '6LeefpklAAAAALobo7anbZZTtKAxisdLj4UXb5eR',
                'site_key' => '6LeefpklAAAAALSf98H4shGJbTncSMrQwanq7Hd8',
                'min_score' => '0.3'
            ])
        ]);
    }
}
