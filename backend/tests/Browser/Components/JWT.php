<?php

namespace Tests\Browser\Components;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Home;
use Tests\Browser\Pages\Register;
use Tests\Browser\Interfaces\Constants;
use Laravel\Dusk\Component as BaseComponent;

class JWT extends BaseComponent implements Constants
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector(): string
    {
        return '#app';
    }

    /**
     * Assert that the browser page contains the component.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser): void
    {
        $browser->assertVisible($this->selector());
    }

    /**
     * Get the element shortcuts for the component.
     *
     * @return array
     */
    public function elements(): array
    {
        return [
            '@name'    => 'input[type="name"]',
            '@email'    => 'input[type="email"]',
            '@password' => 'input[name="password"]',
            '@password-confirmation' => 'input[name="password-confirmation"]',
            '@submit'   => 'button[type="submit"]',
        ];
    }

    /**
     * Register and get JWT Token.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @param  string $name
     * @param  string $email
     * @param  string $password
     * @param  array|string $roles
     * @return void
     */
    public function register(Browser $browser, string $name = null, string $email = null, string $password = null, $roles = 'admin'): void
    {
        $browser->submit([
                    'name' => $name ?? self::USER_NAME,
                    'email' => $email ?? self::USER_EMAIL,
                    'password' => $password ?? self::USER_PASSWORD,
                    'password_confirmation' => $password ?? self::USER_PASSWORD,
                ])
                ->pause(self::PAUSE)
                ->assertPageIs(Home::class)
                ->pause(self::PAUSE);

        \Log::debug(User::all());
        User::whereEmail(self::USER_EMAIL)
            ->first()
            ->assignRole($roles);
    }
}
