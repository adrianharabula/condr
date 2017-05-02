<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // fix Root URL
      \URL::forceRootUrl(env('APP_URL', ''));
      if (str_contains(env('APP_URL', ''), 'https://')) {
          \URL::forceScheme('https');
          //use \URL:forceSchema('https') if you use laravel < 5.4
      }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
