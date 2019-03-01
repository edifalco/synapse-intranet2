<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class StatusTest extends DuskTestCase
{

    public function testCreateStatus()
    {
        $admin = \App\User::find(1);
        $status = factory('App\Status')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $status) {
            $browser->loginAs($admin)
                ->visit(route('admin.statuses.index'))
                ->clickLink('Add new')
                ->type("name", $status->name)
                ->press('Save')
                ->assertRouteIs('admin.statuses.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $status->name)
                ->logout();
        });
    }

    public function testEditStatus()
    {
        $admin = \App\User::find(1);
        $status = factory('App\Status')->create();
        $status2 = factory('App\Status')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $status, $status2) {
            $browser->loginAs($admin)
                ->visit(route('admin.statuses.index'))
                ->click('tr[data-entry-id="' . $status->id . '"] .btn-info')
                ->type("name", $status2->name)
                ->press('Update')
                ->assertRouteIs('admin.statuses.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $status2->name)
                ->logout();
        });
    }

    public function testShowStatus()
    {
        $admin = \App\User::find(1);
        $status = factory('App\Status')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $status) {
            $browser->loginAs($admin)
                ->visit(route('admin.statuses.index'))
                ->click('tr[data-entry-id="' . $status->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $status->name)
                ->logout();
        });
    }

}
