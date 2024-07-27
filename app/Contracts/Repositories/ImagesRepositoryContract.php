<?php

namespace App\Contracts\Repositories;

use App\Models\Image;

interface ImagesRepositoryContract
{
    public function create(string $title, string $extension, string $diskPath): Image;

    public function delete(int $id): bool | null;

    public function getById(int $id): Image;
}
