<?php

$factory->define(App\Uservideo::class, function (Faker\Generator $faker) {
    return [
        "videourl" => $faker->name,
        "user_id" => $faker->name,
        "title" => $faker->name,
        "location" => $faker->name,
        "datetime" => $faker->name,
        "description" => $faker->name,
        "viewed" => $faker->name,
    ];
});
