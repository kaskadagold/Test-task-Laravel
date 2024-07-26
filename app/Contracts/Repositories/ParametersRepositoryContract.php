<?php

namespace App\Contracts\Repositories;

use App\DTO\ListFilterDTO;
use App\Models\Parameter;
use Illuminate\Support\Collection;

interface ParametersRepositoryContract
{
    public function getParameters(): Collection;

    public function getModel(): Parameter;

    public function findForList(ListFilterDTO $listFilterDTO, array $fields = ['*'], array $relations = []): Collection;

    public function getById(int $id, array $relations = []): Parameter;

    public function update(Parameter $parameter, array $fields): Parameter;
}
