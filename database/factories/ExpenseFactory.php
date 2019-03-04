<?php

$factory->define(App\Expense::class, function (Faker\Generator $faker) {
    return [
        "expense_category_id" => factory('App\ExpenseCategory')->create(),
        "entry_date" => $faker->date("d-m-Y", $max = 'now'),
        "amount" => $faker->name,
    ];
});
