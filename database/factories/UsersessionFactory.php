<?php

$factory->define(App\Usersession::class, function (Faker\Generator $faker) {
    return [
        "userid" => $faker->name,
        "username" => $faker->name,
        "userstatus" => $faker->name,
        "created" => $faker->name,
    ];
});
