<?php

$factory->define(App\Countrydatum::class, function (Faker\Generator $faker) {
    return [
        "code" => $faker->name,
        "name" => $faker->name,
        "continent" => $faker->name,
        "region" => $faker->name,
        "surfacearea" => $faker->name,
        "indepyear" => $faker->name,
        "population" => $faker->name,
        "lifeexpectancy" => $faker->name,
        "gnp" => $faker->name,
        "gnpold" => $faker->name,
        "localname" => $faker->name,
        "governmentform" => $faker->name,
        "headofstate" => $faker->name,
        "capital" => $faker->name,
        "code2" => $faker->name,
    ];
});
