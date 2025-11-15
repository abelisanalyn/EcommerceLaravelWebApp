<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Anhskohbo\NoCaptcha\NoCaptcha;

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
        app()->bind('NoCaptcha', fn() => new NoCaptcha(
            config('captcha.secret'),
            config('captcha.sitekey')
        ));
    }
}
