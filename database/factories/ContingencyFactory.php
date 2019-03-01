<?php

$factory->define(App\Contingency::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
