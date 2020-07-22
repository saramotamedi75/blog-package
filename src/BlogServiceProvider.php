<?php


namespace package\Blog\src;


use Illuminate\Support\ServiceProvider;

class BlogServiceprovider extends ServiceProvider
{
    public function boot()
    {
//        include __DIR__.'/routes/web.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'Blog');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php' );


    }
    public function register()
    {
        $this->app->make('Blog\src\Http\controllers\blogController');
    }
}
