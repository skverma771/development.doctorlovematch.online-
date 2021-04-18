<?php

$factory->define(App\Messageconection::class, function (Faker\Generator $faker) {
    return [
        "msg_id" => $faker->name,
        "sender_id" => $faker->name,
        "receiver_id" => $faker->name,
        "notifystatus" => $faker->name,
        "notifycancelstatus" => $faker->name,
        "paymentstatus" => $faker->name,
        "readstatus" => $faker->name,
    ];
});
