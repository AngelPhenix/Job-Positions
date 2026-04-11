@props(['name', 'label'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'type' => 'checkbox',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-zinc-900 border border-zinc-700 px-5 py-4 w-full text-zinc-200">
        <input {{ $attributes($defaults) }} >
        <span class="pl-1">{{ $label }}</span>
    </div>
</x-forms.field>