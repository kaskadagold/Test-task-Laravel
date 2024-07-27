<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ParametersRepositoryContract;
use App\Contracts\Services\FlashMessageContract;
use App\Contracts\Services\ParametersUpdateServiceContract;
use App\Exceptions\ParameterTypeException;
use App\Http\Requests\ParameterRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DTO\ListFilterDTO;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PagesController extends Controller
{
    public function __construct(
        private readonly ParametersRepositoryContract $parametersRepository
    ) {
    }

    //Отображение параметров вместе с подгруженными изображениями
    public function index(Request $request): View
    {
        $listFilterDTO = (new ListFilterDTO())->setId($request->get('id_search'))
            ->setTitle($request->get('title_search'))
            ->setOrderId($request->get('order_id'))
            ->setOrderTitle($request->get('order_title'))
        ;
        $parameters = $this->parametersRepository->findForList($listFilterDTO, relations: ['image', 'imageGray']);

        return view('pages.home', ['parameters' => $parameters, 'filterValues' => $listFilterDTO]);
    }

    // Отображение страницы с формой редактирования параметра
    public function edit(int $id): View
    {
        return view('pages.edit', ['parameter' => $this->parametersRepository->getById($id, ['image', 'imageGray'])]);
    }

    // Обновление данных параметра в БД
    public function update(
        ParameterRequest $request,
        int $id,
        ParametersUpdateServiceContract $parametersService,
        FlashMessageContract $flashMessage,
    ): RedirectResponse {
        try {
            $parametersService->update($id, $request->validated());
        } catch (ParameterTypeException $exception) {
            $flashMessage->error($exception->getMessage());
            throw $exception;
        }

        $flashMessage->success('Параметр успешно обновлен');

        return redirect()->route('index');
    }
}
