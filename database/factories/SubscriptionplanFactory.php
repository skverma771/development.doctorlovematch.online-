<?php

$factory->define(App\Subscriptionplan::class, function (Faker\Generator $faker) {
    return [
        "plan_name" => $faker->name,
        "plan_amount" => $faker->name,
    ];
});
