<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    $icon = factory(App\Icon::class)->create();
    $safe = factory(App\Safe::class)->create();

    return [
        'name' => $faker->name,
        'icon_id' => $icon->id,
        'safe_id' => $safe->id
    ];
});
