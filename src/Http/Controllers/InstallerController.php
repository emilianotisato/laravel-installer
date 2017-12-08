<?php 

namespace EmilianoTisato\LaravelInstaller\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use EmilianoTisato\LaravelInstaller\Facades\AppInstaller;

class InstallerController extends BaseController
{
    public function installer()
    {
        if (AppInstaller::isFirstInstall()) {
            return 'Welcome to the App Installer';
        }

        return 'redirect to and load App Updater';
    }

    public function updater()
    {
        return 'App Updater';
    }
}
