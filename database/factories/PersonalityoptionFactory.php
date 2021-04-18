<?php

$factory->define(App\Personalityoption::class, function (Faker\Generator $faker) {
    return [
        "options" => $faker->name,
    ];
});
