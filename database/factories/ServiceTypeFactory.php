<?php

$factory->define(App\ServiceType::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
    ];
});
