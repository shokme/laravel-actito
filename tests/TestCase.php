<?php

namespace Shokme\Actito\Tests;

use Shokme\Actito\ActitoServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ActitoServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {

    }
}
