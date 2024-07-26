<?php

namespace App\Exceptions;

use App\Contracts\Services\FlashMessageContract;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ParameterTypeException extends HttpException
{
    public function __construct()
    {
        parent::__construct(
            statusCode: 400,
            message: 'Тип параметра не позволяет подгружать ихображения',
            code: 400,
        );
    }

    public function render(): RedirectResponse
    {
        return redirect()->route('index');
    }
}
