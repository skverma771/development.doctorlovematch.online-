<?php

$factory->define(App\Redirectlink::class, function (Faker\Generator $faker) {
    return [
        "old_url" => $faker->name,
        "new_url" => $faker->name,
        "referer" => $faker->name,
        "comment" => $faker->name,
        "hits" => $faker->name,
        "published" => $faker->name,
        "created_date" => $faker->name,
        "modified_date" => $faker->name,
        "header" => $faker->name,
    ];
});
