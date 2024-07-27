<?php

namespace App\Services;

use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Repositories\ImagesRepositoryContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class ImagesService implements ImagesServiceContract
{
    public function __construct(
        private readonly string $disk,
        private readonly ImagesRepositoryContract $imagesRepository,
    ) {
    }

    public function saveFile(UploadedFile $file, string $path): string
    {
        return Storage::disk($this->disk)->putFileAs('', $file, $path);
    }

    public function createFile(UploadedFile $file, string $title, string $extension, string $path): Image
    {
        return $this->imagesRepository->create($title, $extension, $this->saveFile($file, $path));
    }

    public function url(string $path): string
    {
        return Storage::disk($this->disk)->url($path);
    }

    /**
     * Удаление изображения
     * @param \App\Models\Image|int $image
     * @return void
     */
    public function deleteFile(Image | int $image): void
    {
        if (!($image instanceof Image)) {
            $image = $this->imagesRepository->getById($image);
        }

        Storage::disk($this->disk)->delete($image->path);
        $this->imagesRepository->delete($image->id);
    }
}
