<?php

namespace Jason6809\LaravelOpenssl\Tests;

use Jason6809\LaravelOpenssl\LaravelOpensslServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelOpensslServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
    }
}
