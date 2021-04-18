<?php

$factory->define(App\Messageblock::class, function (Faker\Generator $faker) {
    return [
        "user_id" => $faker->name,
        "member_id" => $faker->name,
        "isblock" => $faker->name,
        "isspamorreport" => $faker->name,
    ];
});
