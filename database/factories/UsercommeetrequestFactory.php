<?php

$factory->define(App\Usercommeetrequest::class, function (Faker\Generator $faker) {
    return [
        "userid" => $faker->name,
        "memberid" => $faker->name,
        "userrequest" => $faker->name,
        "userresponse" => $faker->name,
        "datetime" => $faker->name,
    ];
});
