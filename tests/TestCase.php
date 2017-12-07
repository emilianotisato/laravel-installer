<?php

namespace EmilianoTisato\LaravelInstaller\Test;

use Orchestra\Testbench\TestCase as Orchestra;
use EmilianoTisato\LaravelInstaller\LaravelInstallerServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [LaravelInstallerServiceProvider::class];
    }
}
