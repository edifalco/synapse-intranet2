<?php

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    return [
        "user_id" => factory('App\User')->create(),
        "project_id" => factory('App\Project')->create(),
        "contingency_id" => factory('App\Contingency')->create(),
        "expense_type_id" => factory('App\ExpenseType')->create(),
        "meeting_id" => factory('App\Meeting')->create(),
        "date" => $faker->date("d-m-Y", $max = 'now'),
        "due_date" => $faker->date("d-m-Y", $max = 'now'),
        "invoice_subtotal" => $faker->randomFloat(2, 1, 100),
        "invoice_taxes" => $faker->randomFloat(2, 1, 100),
        "invoice_total" => $faker->randomFloat(2, 1, 100),
        "budget_subtotal" => $faker->randomFloat(2, 1, 100),
        "budget_taxes" => $faker->randomFloat(2, 1, 100),
        "budget_total" => $faker->randomFloat(2, 1, 100),
        "provider_id" => factory('App\Provider')->create(),
        "service_type_id" => factory('App\ServiceType')->create(),
        "service" => $faker->name,
        "selection_criteria" => $faker->name,
        "pm_id" => factory('App\User')->create(),
        "pm_approval_date" => $faker->date("H:i:s", $max = 'now'),
        "finance_id" => factory('App\User')->create(),
        "finance_approval_date" => $faker->date("H:i:s", $max = 'now'),
    ];
});
