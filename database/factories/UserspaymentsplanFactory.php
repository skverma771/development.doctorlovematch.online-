<?php

$factory->define(App\Userspaymentsplan::class, function (Faker\Generator $faker) {
    return [
        "user_id" => $faker->name,
        "payment_id" => $faker->name,
        "plan_id" => $faker->name,
        "plan_date" => $faker->name,
        "expire_date" => $faker->name,
    ];
});
