<?php

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "email" => $faker->name,
        "phone" => $faker->name,
        "message" => $faker->name,
    ];
});
