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

    /**
     * Создание записи с информацией об изображении в БД
     * @param string $title
     * @param string $extension
     * @param string $diskPath
     * @return \App\Models\Image
     */
    public function create(string $title, string $extension, string $diskPath): Image
    {
        return $this->getModel()->create(['title' => $title, 'extension' => $extension, 'path' => $diskPath]);
    }

    /**
     * Удаление информации об изображении из БД
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): bool | null
    {
        return $this->getModel()->where('id', $id)->delete();
    }

    /**
     * Получение информации об изображении по его id
     * @param int $id
     * @return \App\Models\Image
     */
    public function getById(int $id): Image
    {
        return $this->getModel()->findOrFail($id);
    }
}
