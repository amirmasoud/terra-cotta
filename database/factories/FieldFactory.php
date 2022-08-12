<?php

namespace Database\Factories;

use App\Enums\FieldTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'type' => FieldTypeEnum::TEXT->value,
            'value' => $this->faker->realTextBetween(3, 255),
        ];
    }
}
