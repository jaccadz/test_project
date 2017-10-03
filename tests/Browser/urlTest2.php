<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class urlTest2 extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/yeah')
                ->type('link', 'https://talentpool.com/')
                ->press('save')
                ->$browser->waitForLocation('/')
                ->clickLink('Click here for your shortened URL')
                ->$browser->waitForLocation('/')
                ->assertPathIs('https://talentpool.com/');
        });
    }
}
