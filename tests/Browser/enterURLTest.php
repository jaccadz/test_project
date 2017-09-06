<?php

namespace Tests\Browser;

use App\Link;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;

class enterURLTest extends DuskTestCase
{
    //use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->type('link', 'https://yts.ag')
                ->press('save')
                ->assertPathIs('/');
        });
    }
}
