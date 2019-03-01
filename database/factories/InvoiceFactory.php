<?php

$factory->define(App\Invoice::class, function (Faker\Generator $faker) {
    return [
        "invoice_subtotal" => $faker->randomFloat(2, 1, 100),
        "invoice_taxes" => $faker->randomFloat(2, 1, 100),
        "invoice_total" => $faker->randomFloat(2, 1, 100),
        "budget_subtotal" => $faker->randomFloat(2, 1, 100),
        "budget_taxes" => $faker->randomFloat(2, 1, 100),
        "budget_total" => $faker->randomFloat(2, 1, 100),
        "date" => $faker->date("d-m-Y", $max = 'now'),
        "due_date" => $faker->date("d-m-Y", $max = 'now'),
        "pm_approval_date" => $faker->date("H:i:s", $max = 'now'),
        "finance_approval_date" => $faker->date("H:i:s", $max = 'now'),
        "expense_type_id" => factory('App\ExpenseType')->create(),
        "meeting_id" => factory('App\Meeting')->create(),
        "contingency_id" => factory('App\Contingency')->create(),
        "provider_id" => factory('App\Provider')->create(),
        "service_type_id" => factory('App\ServiceType')->create(),
        "pm_id" => factory('App\User')->create(),
        "finance_id" => factory('App\User')->create(),
        "service" => $faker->name,
        "selection_criteria" => $faker->name,
        "user_id" => factory('App\User')->create(),
        "project_id" => factory('App\Project')->create(),
        "created_by_id" => factory('App\User')->create(),
    ];
});
