<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class MessageTest extends DuskTestCase
{

    public function testCreateMessage()
    {
        $admin = \App\User::find(1);
        $message = factory('App\Message')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $message) {
            $browser->loginAs($admin)
                ->visit(route('admin.messages.index'))
                ->clickLink('Add new')
                ->type("name", $message->name)
                ->type("email", $message->email)
                ->type("phone", $message->phone)
                ->type("message", $message->message)
                ->press('Save')
                ->assertRouteIs('admin.messages.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $message->name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $message->email)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $message->phone)
                ->assertSeeIn("tr:last-child td[field-key='message']", $message->message)
                ->logout();
        });
    }

    public function testEditMessage()
    {
        $admin = \App\User::find(1);
        $message = factory('App\Message')->create();
        $message2 = factory('App\Message')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $message, $message2) {
            $browser->loginAs($admin)
                ->visit(route('admin.messages.index'))
                ->click('tr[data-entry-id="' . $message->id . '"] .btn-info')
                ->type("name", $message2->name)
                ->type("email", $message2->email)
                ->type("phone", $message2->phone)
                ->type("message", $message2->message)
                ->press('Update')
                ->assertRouteIs('admin.messages.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $message2->name)
                ->assertSeeIn("tr:last-child td[field-key='email']", $message2->email)
                ->assertSeeIn("tr:last-child td[field-key='phone']", $message2->phone)
                ->assertSeeIn("tr:last-child td[field-key='message']", $message2->message)
                ->logout();
        });
    }

    public function testShowMessage()
    {
        $admin = \App\User::find(1);
        $message = factory('App\Message')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $message) {
            $browser->loginAs($admin)
                ->visit(route('admin.messages.index'))
                ->click('tr[data-entry-id="' . $message->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $message->name)
                ->assertSeeIn("td[field-key='email']", $message->email)
                ->assertSeeIn("td[field-key='phone']", $message->phone)
                ->assertSeeIn("td[field-key='message']", $message->message)
                ->logout();
        });
    }

}
