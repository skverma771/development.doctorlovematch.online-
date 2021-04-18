<?php

$factory->define(App\Groupsmember::class, function (Faker\Generator $faker) {
    return [
        "groupid" => $faker->name,
        "memberid" => $faker->name,
        "approved" => $faker->name,
        "requestrecbyid" => $faker->name,
        "created" => $faker->name,
    ];
});
