<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ExpenseTest extends DuskTestCase
{

    public function testCreateExpense()
    {
        $admin = \App\User::find(1);
        $expense = factory('App\Expense')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $expense) {
            $browser->loginAs($admin)
                ->visit(route('admin.expenses.index'))
                ->clickLink('Add new')
                ->select("project_id", $expense->project_id)
                ->select("expense_type_id", $expense->expense_type_id)
                ->select("meeting_id", $expense->meeting_id)
                ->select("contingency_id", $expense->contingency_id)
                ->type("due_date", $expense->due_date)
                ->type("invoice_subtotal", $expense->invoice_subtotal)
                ->type("invoice_taxes", $expense->invoice_taxes)
                ->type("invoice_total", $expense->invoice_total)
                ->type("budget_subtotal", $expense->budget_subtotal)
                ->type("budget_taxes", $expense->budget_taxes)
                ->type("budget_total", $expense->budget_total)
                ->select("provider_id", $expense->provider_id)
                ->select("service_type_id", $expense->service_type_id)
                ->type("service", $expense->service)
                ->type("selection_criteria", $expense->selection_criteria)
                ->select("pm_id", $expense->pm_id)
                ->press('Save')
                ->assertRouteIs('admin.expenses.index')
                ->assertSeeIn("tr:last-child td[field-key='project']", $expense->project->name)
                ->assertSeeIn("tr:last-child td[field-key='expense_type']", $expense->expense_type->name)
                ->assertSeeIn("tr:last-child td[field-key='meeting']", $expense->meeting->name)
                ->assertSeeIn("tr:last-child td[field-key='contingency']", $expense->contingency->name)
                ->assertSeeIn("tr:last-child td[field-key='due_date']", $expense->due_date)
                ->assertSeeIn("tr:last-child td[field-key='provider']", $expense->provider->name)
                ->assertSeeIn("tr:last-child td[field-key='pm']", $expense->pm->name)
                ->logout();
        });
    }

    public function testEditExpense()
    {
        $admin = \App\User::find(1);
        $expense = factory('App\Expense')->create();
        $expense2 = factory('App\Expense')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $expense, $expense2) {
            $browser->loginAs($admin)
                ->visit(route('admin.expenses.index'))
                ->click('tr[data-entry-id="' . $expense->id . '"] .btn-info')
                ->select("project_id", $expense2->project_id)
                ->select("expense_type_id", $expense2->expense_type_id)
                ->select("meeting_id", $expense2->meeting_id)
                ->select("contingency_id", $expense2->contingency_id)
                ->type("due_date", $expense2->due_date)
                ->type("invoice_subtotal", $expense2->invoice_subtotal)
                ->type("invoice_taxes", $expense2->invoice_taxes)
                ->type("invoice_total", $expense2->invoice_total)
                ->type("budget_subtotal", $expense2->budget_subtotal)
                ->type("budget_taxes", $expense2->budget_taxes)
                ->type("budget_total", $expense2->budget_total)
                ->select("provider_id", $expense2->provider_id)
                ->select("service_type_id", $expense2->service_type_id)
                ->type("service", $expense2->service)
                ->type("selection_criteria", $expense2->selection_criteria)
                ->select("pm_id", $expense2->pm_id)
                ->press('Update')
                ->assertRouteIs('admin.expenses.index')
                ->assertSeeIn("tr:last-child td[field-key='project']", $expense2->project->name)
                ->assertSeeIn("tr:last-child td[field-key='expense_type']", $expense2->expense_type->name)
                ->assertSeeIn("tr:last-child td[field-key='meeting']", $expense2->meeting->name)
                ->assertSeeIn("tr:last-child td[field-key='contingency']", $expense2->contingency->name)
                ->assertSeeIn("tr:last-child td[field-key='due_date']", $expense2->due_date)
                ->assertSeeIn("tr:last-child td[field-key='provider']", $expense2->provider->name)
                ->assertSeeIn("tr:last-child td[field-key='pm']", $expense2->pm->name)
                ->logout();
        });
    }

    public function testShowExpense()
    {
        $admin = \App\User::find(1);
        $expense = factory('App\Expense')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $expense) {
            $browser->loginAs($admin)
                ->visit(route('admin.expenses.index'))
                ->click('tr[data-entry-id="' . $expense->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='user']", $expense->user->name)
                ->assertSeeIn("td[field-key='project']", $expense->project->name)
                ->assertSeeIn("td[field-key='expense_type']", $expense->expense_type->name)
                ->assertSeeIn("td[field-key='meeting']", $expense->meeting->name)
                ->assertSeeIn("td[field-key='contingency']", $expense->contingency->name)
                ->assertSeeIn("td[field-key='date']", $expense->date)
                ->assertSeeIn("td[field-key='due_date']", $expense->due_date)
                ->assertSeeIn("td[field-key='invoice_subtotal']", $expense->invoice_subtotal)
                ->assertSeeIn("td[field-key='invoice_taxes']", $expense->invoice_taxes)
                ->assertSeeIn("td[field-key='invoice_total']", $expense->invoice_total)
                ->assertSeeIn("td[field-key='budget_subtotal']", $expense->budget_subtotal)
                ->assertSeeIn("td[field-key='budget_taxes']", $expense->budget_taxes)
                ->assertSeeIn("td[field-key='budget_total']", $expense->budget_total)
                ->assertSeeIn("td[field-key='provider']", $expense->provider->name)
                ->assertSeeIn("td[field-key='service_type']", $expense->service_type->name)
                ->assertSeeIn("td[field-key='service']", $expense->service)
                ->assertSeeIn("td[field-key='selection_criteria']", $expense->selection_criteria)
                ->assertSeeIn("td[field-key='pm']", $expense->pm->name)
                ->assertSeeIn("td[field-key='pm_approval_date']", $expense->pm_approval_date)
                ->assertSeeIn("td[field-key='finance']", $expense->finance->name)
                ->assertSeeIn("td[field-key='finance_approval_date']", $expense->finance_approval_date)
                ->assertSeeIn("td[field-key='created_by']", $expense->created_by->name)
                ->logout();
        });
    }

}
