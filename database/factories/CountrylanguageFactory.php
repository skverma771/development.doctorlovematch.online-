<?php

$factory->define(App\Countrylanguage::class, function (Faker\Generator $faker) {
    return [
        "countrycode" => $faker->name,
        "language" => $faker->name,
        "isofficial" => $faker->name,
        "percentage" => $faker->name,
    ];
});
