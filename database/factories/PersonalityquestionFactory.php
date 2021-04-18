<?php

$factory->define(App\Personalityquestion::class, function (Faker\Generator $faker) {
    return [
        "question" => $faker->name,
    ];
});
