<?php

$factory->define(App\Expense::class, function (Faker\Generator $faker) {
    return [
        "user_id" => factory('App\User')->create(),
        "project_id" => factory('App\Project')->create(),
        "expense_type_id" => factory('App\ExpenseType')->create(),
        "meeting_id" => factory('App\Meeting')->create(),
        "contingency_id" => factory('App\Contingency')->create(),
        "date" => $faker->date("d-m-Y", $max = 'now'),
        "due_date" => $faker->date("d-m-Y", $max = 'now'),
        "invoice_subtotal" => $faker->randomNumber(2),
        "invoice_taxes" => $faker->randomNumber(2),
        "invoice_total" => $faker->randomNumber(2),
        "budget_subtotal" => $faker->randomNumber(2),
        "budget_taxes" => $faker->randomNumber(2),
        "budget_total" => $faker->randomNumber(2),
        "provider_id" => factory('App\Provider')->create(),
        "service_type_id" => factory('App\ServiceType')->create(),
        "service" => $faker->name,
        "selection_criteria" => $faker->name,
        "pm_id" => factory('App\User')->create(),
        "pm_approval_date" => $faker->date("H:i:s", $max = 'now'),
        "finance_id" => factory('App\User')->create(),
        "finance_approval_date" => $faker->date("H:i:s", $max = 'now'),
        "created_by_id" => factory('App\User')->create(),
    ];
});
