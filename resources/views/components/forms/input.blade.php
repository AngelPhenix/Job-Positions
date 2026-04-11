@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-zinc-900 border border-zinc-700 text-zinc-100 placeholder:text-zinc-400 focus:border-orange-400 focus:ring-orange-400 px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }} />
</x-forms.field>