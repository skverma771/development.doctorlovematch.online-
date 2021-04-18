<?php

$factory->define(App\Blockuser::class, function (Faker\Generator $faker) {
    return [
        "user_id" => $faker->name,
        "block_user_id" => $faker->name,
        "status" => $faker->name,
        "created" => $faker->name,
    ];
});
