<?php

namespace Tests\Browser\Pages;

class Home extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/home';
    }

    /**
     * Click on the log out link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickLogout($browser)
    {
        $browser->clickLink('Logout')
            ->pause(300);
    }

    /**
     * Click on categories link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickCategories($browser)
    {
        $browser->click('.col-md-6:last-child')
                ->pause(300);
    }

    /**
     * Click on tags link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickTags($browser)
    {
        $browser->click('.col-sm-6.col-md-3:nth-child(4n)')
                ->pause(300);
    }

    /**
     * Click on users link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickUsers($browser)
    {
        $browser->click('.col-sm-6.col-md-3:nth-child(3n)')
                ->pause(300);
    }

    /**
     * Click on safes link.
     *
     * @param  \Laravel\Dusk\Browser $browser
     * @return void
     */
    public function clickSafes($browser)
    {
        $browser->click('.col-sm-6.col-md-3:first-child')
                ->pause(300);
    }
}
