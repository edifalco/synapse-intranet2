<?php

$factory->define(App\Income::class, function (Faker\Generator $faker) {
    return [
        "income_category_id" => factory('App\IncomeCategory')->create(),
        "entry_date" => $faker->date("d-m-Y", $max = 'now'),
        "amount" => $faker->name,
    ];
});
