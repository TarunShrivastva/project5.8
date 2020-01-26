<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class LanguageMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['master_layouts.nav'],'App\Http\FrontMenu\LanguageMenu');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
