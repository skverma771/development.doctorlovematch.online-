<?php

$factory->define(App\Astrologycalc::class, function (Faker\Generator $faker) {
    return [
        "zodiac" => $faker->name,
        "daterange" => $faker->name,
        "zodiac_images" => $faker->name,
    ];
});
