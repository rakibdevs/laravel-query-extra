<?php

namespace RakibDevs\QueryExtra;

use Illuminate\Support\ServiceProvider;

class QueryExtraServiceProvider extends ServiceProvider
{
     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('RakibDevs\QueryExtra\QueryExtra');
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