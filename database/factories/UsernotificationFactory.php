<?php

$factory->define(App\Usernotification::class, function (Faker\Generator $faker) {
    return [
        "catgories" => $faker->name,
        "userid" => $faker->name,
        "memberid" => $faker->name,
        "notifystatus" => $faker->name,
        "datetime" => $faker->name,
        "requestid" => $faker->name,
        "notifycancelstatus" => $faker->name,
    ];
});
