<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ProjectTest extends DuskTestCase
{

    public function testCreateProject()
    {
        $admin = \App\User::find(1);
        $project = factory('App\Project')->make();

        $relations = [
            factory('App\Medium')->create(), 
            factory('App\Medium')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $project, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.projects.index'))
                ->clickLink('Add new')
                ->type("name", $project->name)
                ->type("start_date", $project->start_date)
                ->type("end_date", $project->end_date)
                ->select('select[name="logo[]"]', $relations[0]->id)
                ->select('select[name="logo[]"]', $relations[1]->id)
                ->select("status_id", $project->status_id)
                ->press('Save')
                ->assertRouteIs('admin.projects.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $project->name)
                ->assertSeeIn("tr:last-child td[field-key='start_date']", $project->start_date)
                ->assertSeeIn("tr:last-child td[field-key='end_date']", $project->end_date)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:first-child", $relations[0]->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:last-child", $relations[1]->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='status']", $project->status->name)
                ->logout();
        });
    }

    public function testEditProject()
    {
        $admin = \App\User::find(1);
        $project = factory('App\Project')->create();
        $project2 = factory('App\Project')->make();

        $relations = [
            factory('App\Medium')->create(), 
            factory('App\Medium')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $project, $project2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.projects.index'))
                ->click('tr[data-entry-id="' . $project->id . '"] .btn-info')
                ->type("name", $project2->name)
                ->type("start_date", $project2->start_date)
                ->type("end_date", $project2->end_date)
                ->select('select[name="logo[]"]', $relations[0]->id)
                ->select('select[name="logo[]"]', $relations[1]->id)
                ->select("status_id", $project2->status_id)
                ->press('Update')
                ->assertRouteIs('admin.projects.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $project2->name)
                ->assertSeeIn("tr:last-child td[field-key='start_date']", $project2->start_date)
                ->assertSeeIn("tr:last-child td[field-key='end_date']", $project2->end_date)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:first-child", $relations[0]->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:last-child", $relations[1]->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='status']", $project2->status->name)
                ->logout();
        });
    }

    public function testShowProject()
    {
        $admin = \App\User::find(1);
        $project = factory('App\Project')->create();

        $relations = [
            factory('App\Medium')->create(), 
            factory('App\Medium')->create(), 
        ];

        $project->logo()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $project, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.projects.index'))
                ->click('tr[data-entry-id="' . $project->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $project->name)
                ->assertSeeIn("td[field-key='start_date']", $project->start_date)
                ->assertSeeIn("td[field-key='end_date']", $project->end_date)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:first-child", $relations[0]->responsive_images)
                ->assertSeeIn("tr:last-child td[field-key='logo'] span:last-child", $relations[1]->responsive_images)
                ->assertSeeIn("td[field-key='status']", $project->status->name)
                ->logout();
        });
    }

}
