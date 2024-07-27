<?php

namespace Database\Factories;

use App\Entity\Parameters\TypeEntity;
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
            'type' => fake()->randomElement(TypeEntity::getAllTypes()),
        ];

        /** Случайное добавление изображений параметрам с требуемым типам */
        if ($fields['type'] === TypeEntity::TYPE_WITH_IMAGES) {
            if (rand(0, 9) >= 4) {
                $fields['icon_id'] = Image::factory();
            }
            if (rand(0, 9) >= 4) {
                $fields['icon_gray_id'] = Image::factory();
            }
        }

        return $fields;
    }
}
