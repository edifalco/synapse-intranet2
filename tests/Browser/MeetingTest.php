<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class MeetingTest extends DuskTestCase
{

    public function testCreateMeeting()
    {
        $admin = \App\User::find(1);
        $meeting = factory('App\Meeting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $meeting) {
            $browser->loginAs($admin)
                ->visit(route('admin.meetings.index'))
                ->clickLink('Add new')
                ->type("name", $meeting->name)
                ->type("city", $meeting->city)
                ->type("start_date", $meeting->start_date)
                ->type("end_date", $meeting->end_date)
                ->select("project_id", $meeting->project_id)
                ->select("status_id", $meeting->status_id)
                ->press('Save')
                ->assertRouteIs('admin.meetings.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $meeting->name)
                ->assertSeeIn("tr:last-child td[field-key='city']", $meeting->city)
                ->assertSeeIn("tr:last-child td[field-key='start_date']", $meeting->start_date)
                ->assertSeeIn("tr:last-child td[field-key='end_date']", $meeting->end_date)
                ->assertSeeIn("tr:last-child td[field-key='project']", $meeting->project->name)
                ->assertSeeIn("tr:last-child td[field-key='status']", $meeting->status->name)
                ->logout();
        });
    }

    public function testEditMeeting()
    {
        $admin = \App\User::find(1);
        $meeting = factory('App\Meeting')->create();
        $meeting2 = factory('App\Meeting')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $meeting, $meeting2) {
            $browser->loginAs($admin)
                ->visit(route('admin.meetings.index'))
                ->click('tr[data-entry-id="' . $meeting->id . '"] .btn-info')
                ->type("name", $meeting2->name)
                ->type("city", $meeting2->city)
                ->type("start_date", $meeting2->start_date)
                ->type("end_date", $meeting2->end_date)
                ->select("project_id", $meeting2->project_id)
                ->select("status_id", $meeting2->status_id)
                ->press('Update')
                ->assertRouteIs('admin.meetings.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $meeting2->name)
                ->assertSeeIn("tr:last-child td[field-key='city']", $meeting2->city)
                ->assertSeeIn("tr:last-child td[field-key='start_date']", $meeting2->start_date)
                ->assertSeeIn("tr:last-child td[field-key='end_date']", $meeting2->end_date)
                ->assertSeeIn("tr:last-child td[field-key='project']", $meeting2->project->name)
                ->assertSeeIn("tr:last-child td[field-key='status']", $meeting2->status->name)
                ->logout();
        });
    }

    public function testShowMeeting()
    {
        $admin = \App\User::find(1);
        $meeting = factory('App\Meeting')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $meeting) {
            $browser->loginAs($admin)
                ->visit(route('admin.meetings.index'))
                ->click('tr[data-entry-id="' . $meeting->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $meeting->name)
                ->assertSeeIn("td[field-key='city']", $meeting->city)
                ->assertSeeIn("td[field-key='start_date']", $meeting->start_date)
                ->assertSeeIn("td[field-key='end_date']", $meeting->end_date)
                ->assertSeeIn("td[field-key='project']", $meeting->project->name)
                ->assertSeeIn("td[field-key='status']", $meeting->status->name)
                ->logout();
        });
    }

}
