<?php

$factory->define(App\Whoviewme::class, function (Faker\Generator $faker) {
    return [
        "userid" => $faker->name,
        "memberid" => $faker->name,
        "notifystatus" => $faker->name,
        "notifycancelstatus" => $faker->name,
        "datetime" => $faker->name,
    ];
});
