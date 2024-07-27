@props(['parameter'])

@csrf

<x-forms.groups.group for="parameterId" error="{{ $errors->first('id') }}">
    <x-slot:label>ID</x-slot:label>
    <x-forms.inputs.text
        id="parameterId"
        name="id"
        placeholder="id"
        value="{{ old('id', $parameter->id) }}"
        error="{{ $errors->first('id') }}"
        disabled
    />
</x-forms.groups.group>

<x-forms.groups.group for="parameterTitle" error="{{ $errors->first('title') }}">
    <x-slot:label>Название</x-slot:label>
    <x-forms.inputs.text
        id="parameterTitle"
        name="title"
        placeholder="Название"
        value="{{ old('title', $parameter->title) }}"
        error="{{ $errors->first('title') }}"
        disabled
    />
</x-forms.groups.group>

<x-forms.groups.group for="parameterType" error="{{ $errors->first('type') }}">
    <x-slot:label>Тип</x-slot:label>
    <x-forms.inputs.select
        id="parameterType"
        name="type"
        error="{{ $errors->first('type') }}"
        disabled
    >
        @foreach ($types as $type) 
            <option
                @selected($type === (int) old('type', $parameter->type))
                value="{{ $type }}"
            >
                {{ $type }}
            </option>
        @endforeach
    </x-forms.inputs.select>
</x-forms.groups.group>

<x-forms.groups.group for="parameterIcon" error="{{ $errors->first('icon') }}">
    <x-slot:label>Icon</x-slot:label>
    <input type="hidden" id="icon_delete" name="delete_icon" value="0" />
    <x-forms.inputs.one-file
        id="parameterIcon"
        name="icon"
        value="{{ $parameter->image?->url }}"
        error="{{ $errors->first('icon') }}"
    />
</x-forms.groups.group>

<x-forms.groups.group for="parameterIconGray" error="{{ $errors->first('icon_gray') }}">
    <x-slot:label>Icon gray</x-slot:label>
    <input type="hidden" id="icon_gray_delete" name="delete_icon_gray" value="0" />
    <x-forms.inputs.one-file
        id="parameterIconGray"
        name="icon_gray"
        value="{{ $parameter->imageGray?->url }}"
        error="{{ $errors->first('icon_gray') }}"
    />
</x-forms.groups.group>
