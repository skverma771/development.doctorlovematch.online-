<?php

$factory->define(App\Country::class, function (Faker\Generator $faker) {
    return [
        "sortname" => $faker->name,
        "name" => $faker->name,
    ];
});
