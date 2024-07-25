<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parameter>
 */
class ParameterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fields = [
            'title' => fake()->unique()->word(),
            'type' => fake()->randomElement([1, 2]),
        ];
        if ($fields['type'] === 2) {
            if (rand()&9 >= 4) {
                $fields['icon_id'] = Image::factory();
            }
            if (rand()&9 >= 4) {
                $fields['icon_gray_id'] = Image::factory();
            }
        }
        return $fields;
    }
}
