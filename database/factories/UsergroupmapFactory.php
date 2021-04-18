<?php

$factory->define(App\Usergroupmap::class, function (Faker\Generator $faker) {
    return [
        "user_id" => $faker->name,
        "group_id" => $faker->name,
    ];
});
