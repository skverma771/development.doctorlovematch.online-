<?php

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        "questions" => $faker->name,
        "questions_type" => $faker->name,
    ];
});
