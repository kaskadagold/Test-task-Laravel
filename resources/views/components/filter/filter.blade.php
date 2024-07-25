@props(['filterValues'])

<form method="GET" action="{{ route('index') }}" class="w-400 mt-5 mb-15">
    @csrf

    <x-forms.inline class="w-400 h-40 mt-5 mb-15">
        <input 
            class="w-full h-38 text-18 rounded-tl-20 rounded-bl-20 border-1 border-gray px-15 py-0 box-shadow h-38 focus-border-change" 
            type="text" 
            placeholder="Поиск по id"
            name="id_search"
            value="{{ $filterValues->getId() ?: '' }}"
        />

        <button type="submit" class="text-16 h-40 p-0 flex content-center px-15 box-shadow rounded-tr-20 rounded-br-20 border-1 bl-0 border-gray bg-gray hover-bg-dark-gray pointer bg-transition">
            <img class="h-20" src="/assets/images/search.png" />
        </button>
    </x-forms.inline>

    <x-forms.inline class="w-400 h-40 mt-5 mb-15">
        <input 
            class="w-full h-38 text-18 rounded-tl-20 rounded-bl-20 border-1 border-gray px-15 py-0 box-shadow h-38 focus-border-change" 
            type="text" 
            placeholder="Поиск по названию"
            name="title_search"
            value="{{ $filterValues->getTitle() ?: '' }}"
        />

        <button type="submit" class="text-16 h-40 p-0 flex content-center px-15 box-shadow rounded-tr-20 rounded-br-20 border-1 bl-0 border-gray bg-gray hover-bg-dark-gray pointer bg-transition">
            <img class="h-20" src="/assets/images/search.png" />
        </button>
    </x-forms.inline>

    <x-forms.inline>
        <div class="font-bold text-18">Сортировать по:</div>
        <x-filter.sort-button name="order_id" current-value="{{ request()->get('order_id') }}">
            ID
        </x-filter.sort-button>
        <x-filter.sort-button name="order_title" current-value="{{ request()->get('order_title') }}">
            Названию
        </x-filter.sort-button>
    </x-forms.inline>

    <hr class="my-15">
    <x-forms.cancel-button href="{{ route('index') }}" class="flex content-center">
        Очистить поиск и сортировку
    </x-forms.cancel-button>
</form>