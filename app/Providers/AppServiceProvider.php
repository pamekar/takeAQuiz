<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        //
        Schema::defaultStringLength(191);
        $public = config('app.env') == 'production' ? '/main/public' : '';

        View::share([
            'public'     => $public,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $public = config('app.env') == 'production' ? '/main/public' : '';

        View::share([
            'public'     => $public,
        ]);

    }
}
