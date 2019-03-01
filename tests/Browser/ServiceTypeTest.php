<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ServiceTypeTest extends DuskTestCase
{

    public function testCreateServiceType()
    {
        $admin = \App\User::find(1);
        $service_type = factory('App\ServiceType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $service_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.service_types.index'))
                ->clickLink('Add new')
                ->type("name", $service_type->name)
                ->press('Save')
                ->assertRouteIs('admin.service_types.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $service_type->name)
                ->logout();
        });
    }

    public function testEditServiceType()
    {
        $admin = \App\User::find(1);
        $service_type = factory('App\ServiceType')->create();
        $service_type2 = factory('App\ServiceType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $service_type, $service_type2) {
            $browser->loginAs($admin)
                ->visit(route('admin.service_types.index'))
                ->click('tr[data-entry-id="' . $service_type->id . '"] .btn-info')
                ->type("name", $service_type2->name)
                ->press('Update')
                ->assertRouteIs('admin.service_types.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $service_type2->name)
                ->logout();
        });
    }

    public function testShowServiceType()
    {
        $admin = \App\User::find(1);
        $service_type = factory('App\ServiceType')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $service_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.service_types.index'))
                ->click('tr[data-entry-id="' . $service_type->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $service_type->name)
                ->logout();
        });
    }

}
