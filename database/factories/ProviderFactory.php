<?php

$factory->define(App\Provider::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "address" => $faker->name,
        "postal_code" => $faker->name,
        "city" => $faker->name,
        "country" => $faker->name,
        "phone" => $faker->name,
        "contact_person" => $faker->name,
        "email" => $faker->name,
    ];
});
