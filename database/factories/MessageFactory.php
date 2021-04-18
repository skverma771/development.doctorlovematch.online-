<?php

$factory->define(App\Message::class, function (Faker\Generator $faker) {
    return [
        "msg_id" => $faker->name,
        "message" => $faker->name,
        "datetime" => $faker->name,
    ];
});
