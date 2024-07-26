<?php

namespace App\Services;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
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
     * Summary of update
     * @param int $id
     * @param array $fields
     * @throws \App\Exceptions\ParameterTypeException
     * @return void
     */
    public function update(int $id, array $fields, FlashMessageContract $flashMessage): void
    {
        $parameter = $this->parametersRepository->getById($id);

        if (
            (int) $parameter->type === TypeEntity::TYPE_WITHOUT_IMAGES || 
            (isset($fields['type']) && $fields['type'] === TypeEntity::TYPE_WITHOUT_IMAGES)
        ) {
            $exception = new ParameterTypeException();
            $flashMessage->error($exception->getMessage());
            throw $exception;
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
        }

        if ($fields['delete_icon']) {
            $fields['icon_id'] = null;
            $this->imagesService->deleteFile($parameter->icon_id);
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
