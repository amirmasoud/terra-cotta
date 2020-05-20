<?php

use Faker\Generator as Faker;

$factory->define(App\Key::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
