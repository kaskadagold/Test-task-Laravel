<?php

namespace App\View\Components\Forms\ConcreteFormsFields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Entity\Parameters\TypeEntity;

class ParameterFormFields extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $types = TypeEntity::getAllTypes();

        return view('components.forms.concrete-forms-fields.parameter-form-fields', ['types' => $types]);
    }
}
