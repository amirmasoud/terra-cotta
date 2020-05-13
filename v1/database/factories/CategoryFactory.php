<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $icon = factory(App\Icon::class)->create();

    return [
        'name' => $faker->name,
        'icon_id' => $icon->id,
    ];
});
