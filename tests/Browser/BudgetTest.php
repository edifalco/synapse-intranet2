<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BudgetTest extends DuskTestCase
{

    public function testCreateBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $budget) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->clickLink('Add new')
                ->type("amount", $budget->amount)
                ->select("projects_id", $budget->projects_id)
                ->select("category_id", $budget->category_id)
                ->select("year_id", $budget->year_id)
                ->press('Save')
                ->assertRouteIs('admin.budgets.index')
                ->assertSeeIn("tr:last-child td[field-key='amount']", $budget->amount)
                ->assertSeeIn("tr:last-child td[field-key='projects']", $budget->projects->name)
                ->assertSeeIn("tr:last-child td[field-key='category']", $budget->category->name)
                ->assertSeeIn("tr:last-child td[field-key='year']", $budget->year->name)
                ->logout();
        });
    }

    public function testEditBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->create();
        $budget2 = factory('App\Budget')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $budget, $budget2) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->click('tr[data-entry-id="' . $budget->id . '"] .btn-info')
                ->type("amount", $budget2->amount)
                ->select("projects_id", $budget2->projects_id)
                ->select("category_id", $budget2->category_id)
                ->select("year_id", $budget2->year_id)
                ->press('Update')
                ->assertRouteIs('admin.budgets.index')
                ->assertSeeIn("tr:last-child td[field-key='amount']", $budget2->amount)
                ->assertSeeIn("tr:last-child td[field-key='projects']", $budget2->projects->name)
                ->assertSeeIn("tr:last-child td[field-key='category']", $budget2->category->name)
                ->assertSeeIn("tr:last-child td[field-key='year']", $budget2->year->name)
                ->logout();
        });
    }

    public function testShowBudget()
    {
        $admin = \App\User::find(1);
        $budget = factory('App\Budget')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $budget) {
            $browser->loginAs($admin)
                ->visit(route('admin.budgets.index'))
                ->click('tr[data-entry-id="' . $budget->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='amount']", $budget->amount)
                ->assertSeeIn("td[field-key='projects']", $budget->projects->name)
                ->assertSeeIn("td[field-key='category']", $budget->category->name)
                ->assertSeeIn("td[field-key='year']", $budget->year->name)
                ->logout();
        });
    }

}
