<?php

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        "userid" => $faker->name,
        "questionid" => $faker->name,
        "optionid" => $faker->name,
        "created" => $faker->name,
    ];
});
