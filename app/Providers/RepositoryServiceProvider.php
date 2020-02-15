<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Admin\Repositories\Interfaces;
use App\Admin\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = ['Article','Content','Category','Language'];

        foreach($models as $model){
            App::bind(
                "App\Admin\Repositories\Interfaces\\{$model}RepositoryInterface",
                "App\Admin\Repositories\\{$model}Repository"
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
