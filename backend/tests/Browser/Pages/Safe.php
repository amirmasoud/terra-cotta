<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Safe extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/safes';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@categories' => '.safes-card:first-child',
            '@tags' => '.safes-card:last-child',
        ];
    }
}
