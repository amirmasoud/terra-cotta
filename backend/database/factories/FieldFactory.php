<?php

use Faker\Generator as Faker;

$factory->define(App\Field::class, function (Faker $faker) {
    $icon  = factory(App\Icon::class)->create();
    $type  = factory(App\Type::class)->create();
    $key  = factory(App\Key::class)->create();
    $group = factory(App\Group::class)->create();

    return [
        'label' => $faker->name,
        'value' => $faker->name,
        'icon_id'  => $icon->id,
        'type_id'  => $type->id,
        'key_id'  => $key->id,
        'group_id' => $group->id,
    ];
});
