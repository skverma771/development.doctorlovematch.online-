<?php

$factory->define(App\Payment::class, function (Faker\Generator $faker) {
    return [
        "user_id" => $faker->name,
        "first_name" => $faker->name,
        "last_name" => $faker->name,
        "zipcode" => $faker->name,
        "country" => $faker->name,
        "payment_status" => $faker->name,
        "txn_id" => $faker->name,
        "txn_type" => $faker->name,
        "payer_email" => $faker->name,
        "payment_gross" => $faker->name,
        "created" => $faker->name,
    ];
});
