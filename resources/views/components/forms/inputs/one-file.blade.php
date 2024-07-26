@props(['name', 'value' => null])

@if ($value)
    <div id="{{ $name . '_container' }}" class="w-1_4 mt-5">
        <div class="relative w-full flex content-center px-10 border-1 border-gray rounded-8 mb-2">
            <img src="{{ $value }}" class="w-160 text-center">
            <button onclick="deleteImageButton(value)" value="{{ $name }}" type="button" class="absolute position w-50 h-50 bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить изображение">
            </button>
        </div>
    </div>
@endif

<x-forms.inputs.file
    {{ $attributes->except('multiple') }}
    :name="$name"
    :multiple="false"
/>
