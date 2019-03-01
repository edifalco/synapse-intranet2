<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExpenseTypeTest extends DuskTestCase
{

    public function testCreateExpenseType()
    {
        $admin = \App\User::find(1);
        $expense_type = factory('App\ExpenseType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $expense_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.expense_types.index'))
                ->clickLink('Add new')
                ->type("name", $expense_type->name)
                ->press('Save')
                ->assertRouteIs('admin.expense_types.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $expense_type->name)
                ->logout();
        });
    }

    public function testEditExpenseType()
    {
        $admin = \App\User::find(1);
        $expense_type = factory('App\ExpenseType')->create();
        $expense_type2 = factory('App\ExpenseType')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $expense_type, $expense_type2) {
            $browser->loginAs($admin)
                ->visit(route('admin.expense_types.index'))
                ->click('tr[data-entry-id="' . $expense_type->id . '"] .btn-info')
                ->type("name", $expense_type2->name)
                ->press('Update')
                ->assertRouteIs('admin.expense_types.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $expense_type2->name)
                ->logout();
        });
    }

    public function testShowExpenseType()
    {
        $admin = \App\User::find(1);
        $expense_type = factory('App\ExpenseType')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $expense_type) {
            $browser->loginAs($admin)
                ->visit(route('admin.expense_types.index'))
                ->click('tr[data-entry-id="' . $expense_type->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $expense_type->name)
                ->logout();
        });
    }

}
