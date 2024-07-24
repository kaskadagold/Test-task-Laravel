@props(['parameter'])

<tr class="border-b-1 collapse text-20">
    <td class="px-10 py-5">
        {{-- <x-forms.form method="POST">
            @method('DELETE')

            @csrf

            <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить">
            </button>
        </x-forms.form> --}}
        <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
            <img class="w-2_3" src="/assets/images/recycle-bin.png" alt="Удалить" title="Удалить">
        </button>
    </td>
    <td class="px-10 py-5">
        <a>
            <button class="w-50 h-50 flex content-center bg-white bg-transition p-0 hover-bg-change pointer border-none rounded-25">
                <img class="w-2_3" src="/assets/images/update-icon.png" alt="Редактировать" title="Редактировать">
            </button>
        </a>
    </td>
    <td class="w-1_3 px-10 py-5">{{ $parameter->id }}</td>
    <td class="w-1_3 px-10 py-5">{{ $parameter->title }}</td>
    <td class="w-1_3 px-10 py-5">{{ $parameter->type }}</td>
</tr>