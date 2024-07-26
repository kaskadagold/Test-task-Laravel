<?php

namespace App\Contracts\Services;

interface ParametersUpdateServiceContract
{
    public function update(int $id, array $fields, FlashMessageContract $flashMessage): void;
}
