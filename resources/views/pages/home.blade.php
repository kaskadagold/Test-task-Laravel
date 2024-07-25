<x-layouts.app>

    <div>
        <h3>Список параметров, к которым можно подгрузить изображения</h3>

        <x-filter.filter :filter-values="$filterValues" />

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