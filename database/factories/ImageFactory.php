<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array | null
    {
        $path = Storage::disk(Image::STORAGE_DISK)
                ->putFile('', new File($this->faker->image()));
        return [
            'title' => $path,
            'path' => $path,
        ];
    }
}
