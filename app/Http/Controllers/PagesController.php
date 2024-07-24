<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ParametersRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function __construct(
        private readonly ParametersRepositoryContract $parametersRepository
    ) {
    }

    public function index(): View
    {
        $parameters = $this->parametersRepository->getParameters();

        return view('pages.home', ['parameters' => $parameters]);
    }
}
