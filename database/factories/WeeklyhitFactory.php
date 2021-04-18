<?php

$factory->define(App\Weeklyhit::class, function (Faker\Generator $faker) {
    return [
        "hits" => $faker->name,
        "created" => $faker->name,
    ];
});
