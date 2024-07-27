<?php

namespace App\Services;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Contracts\Services\ImagesServiceContract;
use App\Contracts\Services\ParametersUpdateServiceContract;
use App\Entity\Parameters\TypeEntity;
use App\Exceptions\ParameterTypeException;

class ParametersService implements ParametersUpdateServiceContract
{
    public function __construct(
        private readonly ParametersRepositoryContract $parametersRepository,
        private readonly ImagesServiceContract $imagesService,
    ) {
    }

    /**
     * Обновление изображений параметра
     * @param int $id
     * @param array $fields
     * @throws \App\Exceptions\ParameterTypeException
     * @return void
     */
    public function update(int $id, array $fields): void
    {
        $parameter = $this->parametersRepository->getById($id);

        /** Если параметр имеет или изменяет тип на не поддерживающий подгрузку изображений, 
         * то будет выброшено исключение ParameterTypeException
         */
        if (
            (int) $parameter->type === TypeEntity::TYPE_WITHOUT_IMAGES || 
            (isset($fields['type']) && (int) $fields['type'] === TypeEntity::TYPE_WITHOUT_IMAGES)
        ) {
            throw new ParameterTypeException();
        }

        $oldIconId = null;
        $oldIconGrayId = null;

        if (!empty($fields['icon'])) {
            $icon = $this->imagesService->createFile(
                $fields['icon'],
                $fields['icon_title'],
                $fields['icon_extension'], 
                $fields['icon_path'],
            );
            $fields['icon_id'] = $icon->id;
            $oldIconId = $parameter->icon_id;

            $fields['delete_icon'] = "0";
        }

        if ($fields['delete_icon']) {
            $fields['icon_id'] = null;
            $this->imagesService->deleteFile($parameter->icon_id);
        }

        if (!empty($fields['icon_gray'])) {
            $iconGray = $this->imagesService->createFile(
                $fields['icon_gray'],
                $fields['icon_gray_title'],
                $fields['icon_gray_extension'], 
                $fields['icon_gray_path'],
            );
            $fields['icon_gray_id'] = $iconGray->id;
            $oldIconGrayId = $parameter->icon_gray_id;

            $fields['delete_icon_gray'] = "0";
        }

        if ($fields['delete_icon_gray']) {
            $fields['icon_gray_id'] = null;
            $this->imagesService->deleteFile($parameter->icon_gray_id);
        }

        $this->parametersRepository->update($parameter, $fields);

        if (!empty($oldIconId)) {
            $this->imagesService->deleteFile($oldIconId);
        }

        if (!empty($oldIconGrayId)) {
            $this->imagesService->deleteFile($oldIconGrayId);
        }
    }
}
