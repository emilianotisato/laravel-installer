<?php

namespace EmilianoTisato\LaravelInstaller\Facades;

use Illuminate\Support\Facades\Facade;

class AppInstaller extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'app-installer';
    }
}
