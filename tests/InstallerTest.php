<?php

namespace EmilianoTisato\LaravelInstaller\Test;

class InstallerTest extends TestCase
{
    /** @test */
    public function it_detects_if_it_is_a_first_time_installation_and_load_wizard()
    {
        // Given a fresh/just deployed application
        $this->app['config']->set('laravel-installer.current_version', null);

        // When I visit the install route
        $crawler = $this->call('GET', 'app-installer');

        // Then I see the installation wizard
        $this->assertRegexp('/Welcome to the App Installer/', $crawler->getContent());
    }

    /** @test */
    public function it_detects_if_app_is_installed_and_redirect_to_updater()
    {
        // Given an alredy installed application
        $this->app['config']->set('laravel-installer.current_version', '1.0');

        // When I visit the install route
        $crawler = $this->call('GET', 'app-installer');

        // Then I got redirected to the updater view
        $this->assertRegexp('/App Updater/', $crawler->getContent());
    }
}
