<x-layouts.app>

    <div>
        <h3>Список параметров, к которым можно подгрузить изображения</h3>

        {{-- Поиск и сортировка параметров --}}
        <x-filter.filter :filter-values="$filterValues" />

        {{-- Отображение параметров в виде таблицы --}}
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
