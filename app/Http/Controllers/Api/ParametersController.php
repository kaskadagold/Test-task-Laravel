<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParameterResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParametersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        ParametersRepositoryContract $parametersRepository
    ): JsonResponse {
        $parameters = ParameterResource::collection(
            $parametersRepository->getParameters(['image', 'imageGray'])
        );

        return new JsonResponse(['parameters'=> $parameters]);
    }
}
