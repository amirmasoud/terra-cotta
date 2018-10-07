<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Safe;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Register;
use Tests\Browser\Components\JWT;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SafeTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setup();

        static::closeAll();
    }

    /**
     * See safes index page.
     *
     * @group  safes
     * @test
     * @return void
     */
    public function see_safe_index(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                    ->within(new JWT, function ($browser) {
                        $browser->register();
                    })
                    ->visit('/safes')
                    ->assertPathIs('/safes');
        });
    }

    /**
     * @group  safes
     * @test
     * @return void
     */
    public function see_safe_create_page(): void
    {
        $this->browse(function ($browser) {
            $browser->visit(new Register)
                ->within(new JWT, function ($browser) {
                    $browser->register();
                })
                ->visit('/safes/create')
                ->assertPathIs('/safes/create')
                ->pause(300)
                ->type('name', 'Test name')
                ->type('categories', 'l')
                ->pause(500)
                ->click('.autocomplete .item:first-child')
                ->type('tags', 'e')
                ->pause(500)
                ->click('.autocomplete .item:first-child')
                ->press('Add group')
                ->pause(300)
                ->type('groups[0][name]', 'Test Group')
                ->press('Add field')
                ->pause(500)
                ->type("input[name=\"groups[0]['fields'][0]['label']\"]", 'Test label')
                ->type("input[name=\"groups[0]['fields'][0]['value']\"]", "Test Text Value")
                ->screenshot('Create_safe.jpg')
                ->press('Create');
        });
    }
}
