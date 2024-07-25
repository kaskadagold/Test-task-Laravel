<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ParametersRepositoryContract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DTO\ListFilterDTO;

class PagesController extends Controller
{
    public function __construct(
        private readonly ParametersRepositoryContract $parametersRepository
    ) {
    }

    public function index(Request $request): View
    {
        // $parameters = $this->parametersRepository->getParameters();
        $listFilterDTO = (new ListFilterDTO())->setId($request->get('id_search'))
            ->setTitle($request->get('title_search'))
            ->setOrderId($request->get('order_id'))
            ->setOrderTitle($request->get('order_title'))
        ;
        $parameters = $this->parametersRepository->findForList($listFilterDTO);

        return view('pages.home', ['parameters' => $parameters, 'filterValues' => $listFilterDTO]);
    }
}
