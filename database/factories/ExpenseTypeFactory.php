<?php

$factory->define(App\ExpenseType::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
