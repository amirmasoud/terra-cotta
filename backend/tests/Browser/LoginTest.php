<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Login;

class LoginTest extends DuskTestCase
{
    public function setUp()
    {
        parent::setup();

        static::closeAll();
    }

    /**
     * @group  login
     * @test
     * @return void
     */
    public function login_with_valid_credentials()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->pause(300)
                ->submit($user->email, 'secret')
                ->assertPageIs(Home::class)
                ->pause(300);
        });
    }

    /**
     * @group  login
     * @test
     * @return void
     */
    public function login_with_invalid_credentials()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login)
                ->pause(300)
                ->submit('test@test.app', 'secret')
                ->assertSee('These credentials do not match our records.');
        });
    }

    /**
     * @group  login
     * @test
     * @return void
     */
    public function log_out_the_user()
    {
        $user = factory(User::class)->create();

        $this->browse(function ($browser) use ($user) {
            $browser->visit(new Login)
                ->pause(300)
                ->submit($user->email, 'secret')
                ->on(new Home)
                ->clickLogout()
                ->assertPageIs(Login::class);
        });
    }
}
