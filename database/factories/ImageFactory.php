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

        $pos = strrpos($path, '.');
        $title = substr($path, 0, $pos);
        $extension = substr($path, $pos + 1);

        return [
            'title' => $title,
            'extension' => $extension,
            'path' => $path,
        ];
    }
}
