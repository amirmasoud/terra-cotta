<?php

use Faker\Generator as Faker;

$factory->define(App\Safe::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
