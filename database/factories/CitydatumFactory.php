<?php

$factory->define(App\Citydatum::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "countrycode" => $faker->name,
        "district" => $faker->name,
        "population" => $faker->name,
    ];
});
