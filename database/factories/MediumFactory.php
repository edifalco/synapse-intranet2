<?php

$factory->define(App\Medium::class, function (Faker\Generator $faker) {
    return [
        "model_type" => $faker->name,
        "model_id" => $faker->randomNumber(2),
        "collection_name" => $faker->name,
        "name" => $faker->name,
        "file_name" => $faker->name,
        "disk" => $faker->name,
        "mime_type" => $faker->name,
        "size" => $faker->randomNumber(2),
        "manipulations" => $faker->name,
        "custom_properties" => $faker->name,
        "responsive_images" => $faker->name,
        "order_column" => $faker->randomNumber(2),
    ];
});
