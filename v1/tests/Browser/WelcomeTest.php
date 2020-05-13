<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

class WelcomeTest extends DuskTestCase
{
    /**
     * @group  welcome
     * @test
     * @return void
     */
    public function basic_test()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->pause(300)
                ->assertSee('Passwords');
        });
    }
}
