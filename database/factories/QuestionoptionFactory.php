<?php

$factory->define(App\Questionoption::class, function (Faker\Generator $faker) {
    return [
        "options" => $faker->name,
    ];
});
