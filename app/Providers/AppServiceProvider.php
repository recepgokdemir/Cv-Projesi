<?php

namespace App\Providers;

use App\Models\Integration;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $recaptcha = Integration::find(1);
        $recaptchaConfig = json_decode($recaptcha->config);

        if ($recaptcha->status)
        {
            config([
               'recaptcha.status' => true,
               'recaptcha.version' => $recaptchaConfig->version,
               'recaptcha.api_site_key' => $recaptchaConfig->site_key,
               'recaptcha.api_secret_key' => $recaptchaConfig->secret_key,
               'recaptcha.min_score' => $recaptchaConfig->min_score
            ]);
        }
    }
}
