<?php

use Faker\Generator as Faker;

$factory->define(App\Icon::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'class' => $faker->name
    ];
});
