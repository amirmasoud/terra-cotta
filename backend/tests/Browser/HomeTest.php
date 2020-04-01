<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Register;
use Tests\Browser\Components\JWT;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test see for box of home page.
     *
     * @group  home
     * @return void
     */
    public function testSeeForBoxes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register)
                    ->within(new JWT, function ($browser) {
                        $browser->register();
                    })
                    ->assertPageIs(Home::class)
                    ->visit('/home')
                    ->pause(300)
                    ->assertSee('Safes')
                    ->assertSee('Users')
                    ->assertSee('Tags')
                    ->assertSee('Categories');
        });
    }
}
