<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ProviderTest extends DuskTestCase
{

    public function testCreateProvider()
    {
        $admin = \App\User::find(1);
        $provider = factory('App\Provider')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $provider) {
            $browser->loginAs($admin)
                ->visit(route('admin.providers.index'))
                ->clickLink('Add new')
                ->type("name", $provider->name)
                ->type("address", $provider->address)
                ->type("postal_code", $provider->postal_code)
                ->type("city", $provider->city)
                ->type("country", $provider->country)
                ->type("phone", $provider->phone)
                ->type("contact_person", $provider->contact_person)
                ->type("email", $provider->email)
                ->press('Save')
                ->assertRouteIs('admin.providers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $provider->name)
                ->assertSeeIn("tr:last-child td[field-key='address']", $provider->address)
                ->assertSeeIn("tr:last-child td[field-key='postal_code']", $provider->postal_code)
                ->assertSeeIn("tr:last-child td[field-key='city']", $provider->city)
                ->assertSeeIn("tr:last-child td[field-key='country']", $provider->country)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $provider->phone)
                ->assertSeeIn("tr:last-child td[field-key='contact_person']", $provider->contact_person)
                ->assertSeeIn("tr:last-child td[field-key='email']", $provider->email)
                ->logout();
        });
    }

    public function testEditProvider()
    {
        $admin = \App\User::find(1);
        $provider = factory('App\Provider')->create();
        $provider2 = factory('App\Provider')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $provider, $provider2) {
            $browser->loginAs($admin)
                ->visit(route('admin.providers.index'))
                ->click('tr[data-entry-id="' . $provider->id . '"] .btn-info')
                ->type("name", $provider2->name)
                ->type("address", $provider2->address)
                ->type("postal_code", $provider2->postal_code)
                ->type("city", $provider2->city)
                ->type("country", $provider2->country)
                ->type("phone", $provider2->phone)
                ->type("contact_person", $provider2->contact_person)
                ->type("email", $provider2->email)
                ->press('Update')
                ->assertRouteIs('admin.providers.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $provider2->name)
                ->assertSeeIn("tr:last-child td[field-key='address']", $provider2->address)
                ->assertSeeIn("tr:last-child td[field-key='postal_code']", $provider2->postal_code)
                ->assertSeeIn("tr:last-child td[field-key='city']", $provider2->city)
                ->assertSeeIn("tr:last-child td[field-key='country']", $provider2->country)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $provider2->phone)
                ->assertSeeIn("tr:last-child td[field-key='contact_person']", $provider2->contact_person)
                ->assertSeeIn("tr:last-child td[field-key='email']", $provider2->email)
                ->logout();
        });
    }

    public function testShowProvider()
    {
        $admin = \App\User::find(1);
        $provider = factory('App\Provider')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $provider) {
            $browser->loginAs($admin)
                ->visit(route('admin.providers.index'))
                ->click('tr[data-entry-id="' . $provider->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $provider->name)
                ->assertSeeIn("td[field-key='address']", $provider->address)
                ->assertSeeIn("td[field-key='postal_code']", $provider->postal_code)
                ->assertSeeIn("td[field-key='city']", $provider->city)
                ->assertSeeIn("td[field-key='country']", $provider->country)
                ->assertSeeIn("td[field-key='phone']", $provider->phone)
                ->assertSeeIn("td[field-key='contact_person']", $provider->contact_person)
                ->assertSeeIn("td[field-key='email']", $provider->email)
                ->logout();
        });
    }

}
