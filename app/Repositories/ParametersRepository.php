<?php

namespace App\Repositories;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Entity\Parameters\TypeEntity;
use App\Models\Parameter;
use Illuminate\Support\Collection;
use App\DTO\ListFilterDTO;

class ParametersRepository implements ParametersRepositoryContract
{
    public function __construct(private readonly Parameter $model)
    {
    }

    public function getModel(): Parameter
    {
        return $this->model;
    }

    public function getParameters(array $relations = []): Collection
    {
        return $this->getModel()
            ->where('type', TypeEntity::TYPE_WITH_IMAGES)
            ->when($relations, fn ($query) => $query->with($relations))
            ->get()
        ;
    }

    public function findForList(
        ListFilterDTO $listFilterDTO,
        array $fields = ['*'],
        array $relations = [], 
    ): Collection 
    {
        return $this->getModel()
            ->where('type', TypeEntity::TYPE_WITH_IMAGES)
            ->when($listFilterDTO->getId() !== null, fn ($query) => 
                $query->where('id', 'like', '%' . $listFilterDTO->getId() . '%')
            )
            ->when($listFilterDTO->getTitle() !== null, fn ($query) => 
                $query->where('title', 'like', '%' . $listFilterDTO->getTitle() . '%')
            )
            ->when($listFilterDTO->getOrderId() !== null, fn ($query) => $query->orderBy('id', $listFilterDTO->getOrderId()))
            ->when($listFilterDTO->getOrderTitle() !== null, fn ($query) => $query->orderBy('title', $listFilterDTO->getOrderTitle()))
            ->when($relations, fn ($query) => $query->with($relations))
            ->get($fields)
        ;
    }

    public function getById(int $id, array $relations = []): Parameter
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id)
        ;
    }

    public function update(Parameter $parameter, array $fields): Parameter
    {
        $parameter->update($fields);

        return $parameter;
    }
}
