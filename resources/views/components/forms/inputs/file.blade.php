@props(['multiple' => false, 'error' => null])

<input
    type="file"
    @class([
        'block text-16 mt-5 mb-15 py-5 px-10 w-1_4 h-30 border-1 rounded-8 box-shadow focus-border-change',
        'border-gray' => empty($error),
        'border-red' => !empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    @if ($multiple)
        multiple="multiple"
    @endif
/>
