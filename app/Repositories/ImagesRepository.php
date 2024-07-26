<?php

namespace App\Repositories;

use App\Contracts\Repositories\ImagesRepositoryContract;
use App\Models\Image;

class ImagesRepository implements ImagesRepositoryContract
{
    public function __construct(private readonly Image $model)
    {
    }

    private function getModel(): Image
    {
        return $this->model;
    }

    public function create(string $title, string $extension, string $diskPath): Image
    {
        return $this->getModel()->create(['title' => $title, 'extension' => $extension, 'path' => $diskPath]);
    }

    public function delete(int $id): bool | null
    {
        return $this->getModel()->where('id', $id)->delete();
    }

    public function getById(int $id): Image
    {
        return $this->getModel()->findOrFail($id);
    }
}
