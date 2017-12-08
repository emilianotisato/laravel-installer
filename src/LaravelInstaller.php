<?php

namespace EmilianoTisato\LaravelInstaller;

use DB;

class LaravelInstaller
{
    /**
     * The application version
     *
     * @var integer
     */
    protected $version;

    public function __construct()
    {
        $this->version = config('laravel-installer.current_version');
    }

    /**
     * Get application current version
     *
     * @return void
     */
    public function getCurrentVersion()
    {
        return $this->version;
    }

    /**
     * Check if is system first installation
     *
     * @return boolean
     */
    public function isFirstInstall()
    {
        // If we have some version, procede normally
        if ($this->version === null) {
            return true;
        }

        try {
            // Try to establish a PDO connection
            DB::connection()->getPdo();
            $isFirstInstalle = false;
        } catch (\Exception $e) {
            $isFirstInstalle = true;
        }
        // TODO: trow exeption with some message like
        // System is corrup. You have a correct database connection in your configuration file, but you miss the system version.
        return $isFirstInstalle;
    }

    /**
     * Set/update enviroment values in the root .env file
     *
     * @param [type] $envKey
     * @param [type] $envValue
     * @return void
     */
    public function setEnvironmentValue($envKey, $envValue)
    {
        // If we have the key, replace it
        if (preg_match("/^{$envKey}/m", file_get_contents(app()->environmentFilePath()))) {
            file_put_contents(
                app()->environmentFilePath(),
                preg_replace(
                    "/^{$envKey}.*/m", // Replace the complete line
                    $envKey . '=' . $envValue, // By this new key value pair
                    file_get_contents(app()->environmentFilePath())
                )
            );
        } else { // Else append to the file as a new key value pair
            file_put_contents(
                app()->environmentFilePath(),
                $envKey . '=' . $envValue . PHP_EOL,
                FILE_APPEND
            );
        }
    }
}
