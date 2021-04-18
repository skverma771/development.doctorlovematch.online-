<?php

$factory->define(App\Messagedelete::class, function (Faker\Generator $faker) {
    return [
        "from_user_id" => $faker->name,
        "to_id" => $faker->name,
        "msg_id" => $faker->name,
        "status" => $faker->name,
        "datetime" => $faker->name,
    ];
});
