<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {
    $icon = factory(App\Icon::class)->create();
    $key = factory(App\Key::class)->create();

    return [
        'name' => $faker->name,
        'icon_id' => $icon->id,
        'key_id' => $key->id
    ];
});
