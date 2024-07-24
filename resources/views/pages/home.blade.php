<x-layouts.app>

    <div class="flex content-center">
        <a href="{{ route('create') }}">
            <button class="text-18 font-bold text-white bg-purple px-30 py-15 rounded-25 pointer">
                + Добавить новый параметр
            </button>
        </a>
    </div>

    <div>
        <h3>Список параметров</h3>

        @if ($parameters->isNotEmpty())
            <x-parameters.table>
                @foreach ($parameters as $parameter)
                    <x-parameters.table-item :parameter="$parameter" />
                @endforeach
            </x-parameters.table>
        @else
            <p class="text-18">Нет сохраненных параметров...</p>
        @endif
    </div>

</x-layouts.app>