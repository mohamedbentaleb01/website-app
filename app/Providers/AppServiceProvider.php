<?php

namespace App\Providers;

use App\Http\ViewComposers\ActivityComposer;
use App\Http\ViewComposers\EventsComposer;
use App\Http\ViewComposers\HomeComposer;
use App\Http\ViewComposers\PostsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('*', ActivityComposer::class);
        View()->composer('home', HomeComposer::class);
    }
}
