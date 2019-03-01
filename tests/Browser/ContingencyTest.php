<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ContingencyTest extends DuskTestCase
{

    public function testCreateContingency()
    {
        $admin = \App\User::find(1);
        $contingency = factory('App\Contingency')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $contingency) {
            $browser->loginAs($admin)
                ->visit(route('admin.contingencies.index'))
                ->clickLink('Add new')
                ->type("name", $contingency->name)
                ->press('Save')
                ->assertRouteIs('admin.contingencies.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $contingency->name)
                ->logout();
        });
    }

    public function testEditContingency()
    {
        $admin = \App\User::find(1);
        $contingency = factory('App\Contingency')->create();
        $contingency2 = factory('App\Contingency')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $contingency, $contingency2) {
            $browser->loginAs($admin)
                ->visit(route('admin.contingencies.index'))
                ->click('tr[data-entry-id="' . $contingency->id . '"] .btn-info')
                ->type("name", $contingency2->name)
                ->press('Update')
                ->assertRouteIs('admin.contingencies.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $contingency2->name)
                ->logout();
        });
    }

    public function testShowContingency()
    {
        $admin = \App\User::find(1);
        $contingency = factory('App\Contingency')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $contingency) {
            $browser->loginAs($admin)
                ->visit(route('admin.contingencies.index'))
                ->click('tr[data-entry-id="' . $contingency->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $contingency->name)
                ->logout();
        });
    }

}
