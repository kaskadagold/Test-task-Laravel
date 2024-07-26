<x-layouts.app>
    <x-panels.messages.form-validation-errors />

    <x-forms.form action="{{ route('update', ['parameter' => $parameter]) }}" method="post" enctype="multipart/form-data">
        <x-forms.concrete-forms-fields.parameter-form-fields :parameter="$parameter" />

        <x-forms.row>
            <x-forms.submit-button>
                Сохранить
            </x-forms.submit-button>
            <x-forms.cancel-button href="{{ route('index') }}" class="ml-10">
                Отменить
            </x-forms.cancel-button>
        </x-forms.row>
    </x-forms.form>
</x-layouts.app>
