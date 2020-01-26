<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class BreadCrumbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['master_layouts.ad'],'App\Http\ViewMenu\BreadCrumb');
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
