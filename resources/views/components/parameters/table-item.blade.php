@props(['parameter'])

<tr class="border-b-1 collapse text-20">
    <td class="px-10 py-5">
        <a href="{{ route('edit', ['parameter' => $parameter]) }}">
            <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/update-icon.png" alt="Редактировать" title="Редактировать">
            </button>
        </a>
    </td>
    <td class="w-1_5 px-10 py-5">{{ $parameter->id }}</td>
    <td class="w-1_5 px-10 py-5">{{ $parameter->title }}</td>
    <td class="w-1_5 px-10 py-5">{{ $parameter->type }}</td>
    <td class="w-1_5 px-10 py-5">
        @isset($parameter->image?->url)
            <img src="{{ $parameter->image->url }}" alt="{{ $parameter->image->title }}" class="w-160">
        @else
            Нет изображения
        @endisset
    </td>
    <td class="w-1_5 px-10 py-5">
        @isset($parameter->imageGray?->url)
            <img src="{{ $parameter->imageGray->url }}" alt="{{ $parameter->imageGray->title }}" class="w-160">
        @else
            Нет изображения
        @endisset
    </td>
</tr>
