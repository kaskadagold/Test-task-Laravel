<?php

namespace App\Contracts\Services;

use App\Models\Image;
use Illuminate\Http\UploadedFile;

interface ImagesServiceContract
{
    public function saveFile(UploadedFile $file, string $path): string;

    public function createFile(UploadedFile $file, string $title, string $extension, string $path): Image;

    public function url(string $path): string;

    public function deleteFile(Image | int $image): void;
}
