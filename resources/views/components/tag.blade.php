@props(['tag', 'size' => 'base'])

@php
    $classes = "inline-flex items-center whitespace-nowrap leading-none bg-zinc-800/80 text-zinc-200 border border-zinc-600/70 hover:bg-orange-500 hover:text-zinc-950 rounded-xl font-bold transition-colors duration-200";
    
    if ($size == 'base') {
        $classes .= " px-5 py-1 text-sm";
    }

    if ($size == 'small') {
        $classes .= " px-3 py-1 text-xs";
    }
@endphp

<a href="/tags/{{strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>