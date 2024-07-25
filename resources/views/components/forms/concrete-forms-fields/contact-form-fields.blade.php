@csrf

<x-forms.groups.group for="parameterTitle" error="{{ $errors->first('title') }}">
    <x-slot:label>Имя</x-slot:label>
    <x-forms.inputs.text
        id="parameterTitle"
        name="title"
        placeholder="Название"
        value="{{ old('title', $parameter->name) }}"
        error="{{ $errors->first('title') }}"
        required
    />
</x-forms.groups.group>

{{-- ДОДЕЛАТЬ --}}
<x-forms.groups.group for="parameterType" error="{{ $errors->first('type') }}">
    <x-slot:label>Тип</x-slot:label>
    <x-forms.inputs.select
        id="parameterType"
        name="type"
        error="{{ $errors->first('type') }}"
    >
        @foreach ($priorities as $priority) 
            <option
                @selected($priority->id === old('type', $parameter->type))
                value="{{ $priority->id }}"
            >
                {{ $priority->name }}
            </option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>