<?php

namespace RakibDevs\QueryExtra\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;
use RakibDevs\QueryExtra\QueryExtraServiceProvider;

class TestCase extends Orchestra
{
    use DatabaseMigrations;


    protected function getPackageProviders($app)
    {
        return [QueryExtraServiceProvider::class];
    }

}
