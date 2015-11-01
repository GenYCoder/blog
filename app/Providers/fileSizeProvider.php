<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\FileSize;

class fileSizeProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\FileSizeContract', function($app){
            
                return new FileSize();
            
        });
    }

    public function provides()
    {
        return ['App\Helpers\Contracts\FileSizeContract'];
    }
}
