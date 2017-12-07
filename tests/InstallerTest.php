<?php

namespace EmilianoTisato\LaravelInstaller\Test;

class InstallerTest extends TestCase
{
    /**@test */
    public function it_detects_if_it_is_a_first_time_installation()
    {
        // Given the install route for this just deployed application
        $user = factory(App\User::class, 1)->create();
        dd($user);

        // When I visit the install route
        // Then I see the installation wizard
    }
}
