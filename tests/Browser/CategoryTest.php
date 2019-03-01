<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CategoryTest extends DuskTestCase
{

    public function testCreateCategory()
    {
        $admin = \App\User::find(1);
        $category = factory('App\Category')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $category) {
            $browser->loginAs($admin)
                ->visit(route('admin.categories.index'))
                ->clickLink('Add new')
                ->type("name", $category->name)
                ->press('Save')
                ->assertRouteIs('admin.categories.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $category->name)
                ->logout();
        });
    }

    public function testEditCategory()
    {
        $admin = \App\User::find(1);
        $category = factory('App\Category')->create();
        $category2 = factory('App\Category')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $category, $category2) {
            $browser->loginAs($admin)
                ->visit(route('admin.categories.index'))
                ->click('tr[data-entry-id="' . $category->id . '"] .btn-info')
                ->type("name", $category2->name)
                ->press('Update')
                ->assertRouteIs('admin.categories.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $category2->name)
                ->logout();
        });
    }

    public function testShowCategory()
    {
        $admin = \App\User::find(1);
        $category = factory('App\Category')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $category) {
            $browser->loginAs($admin)
                ->visit(route('admin.categories.index'))
                ->click('tr[data-entry-id="' . $category->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $category->name)
                ->logout();
        });
    }

}
