<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $models = [
        //     'Role',
        //     'User',
        // ];

        // foreach ($models as $model) {
        //     $this->app->bind(
        //         "App\Contracts\\{$model}Interface",
        //         "App\Repositories\\{$model}Repository"
        //     );
        // }


        App::bind('App\Admin\Repositories\Interfaces\ArticleRepositoryInterface', 'App\Admin\Repositories\ArticleRepository');
        App::bind('App\Admin\Repositories\Interfaces\ContentRepositoryInterface', 'App\Admin\Repositories\ContentRepository');
        App::bind('App\Admin\Repositories\Interfaces\CategoryRepositoryInterface', 'App\Admin\Repositories\CategoryRepository');
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
