@props(['name', 'label'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-zinc-900 text-zinc-100 border border-zinc-700 focus:border-orange-400 focus:ring-orange-400 px-5 py-4 w-full [&>option]:bg-zinc-900 [&>option]:text-zinc-100'
    ];
@endphp

<x-forms.field :$label :$name>
    <select {{ $attributes($defaults) }} > 
        {{ $slot }}
    </select>
</x-forms.field>