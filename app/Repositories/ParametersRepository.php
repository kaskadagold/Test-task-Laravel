<?php

namespace App\Repositories;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Models\Parameter;
use Illuminate\Support\Collection;

class ParametersRepository implements ParametersRepositoryContract
{
    public function __construct(private readonly Parameter $model)
    {
    }

    public function getModel(): Parameter
    {
        return $this->model;
    }

    public function getParameters(): Collection
    {
        return $this->getModel()->get();
    }
}
