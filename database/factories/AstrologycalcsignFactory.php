<?php

$factory->define(App\Astrologycalcsign::class, function (Faker\Generator $faker) {
    return [
        "signfrom" => $faker->name,
        "signto" => $faker->name,
        "description" => $faker->name,
    ];
});
