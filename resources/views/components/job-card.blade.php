@props(['job'])

@php
    $visibleTags = $job->tags->take(5);
    $hasMoreTags = $job->tags->count() > 5;
@endphp

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm text-zinc-400">{{ $job->employer->name }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-orange-400 text-xl font-bold transition-colors duration-150">
            <a href="{{ $job->url }}" target="_blank">{{ $job->title }}</a>
        </h3>
        <p class="text-sm mt-4 text-zinc-300">{{ $job->schedule }} - For {{ str_ends_with($job->salary, '€') ? $job->salary : $job->salary . '€' }}</p>
    </div>

    <div class="flex justify-center items-center mt-auto w-full">
        <div class="flex flex-wrap justify-center gap-2">
            @foreach($visibleTags as $tag)
            <x-tag :$tag size="small" />
            @endforeach

            @if($hasMoreTags)
                <span class="inline-flex items-center whitespace-nowrap leading-none px-3 py-1 text-xs bg-zinc-800/80 text-zinc-200 border border-zinc-600/70 rounded-xl font-bold">...</span>
            @endif
        </div>
    </div>
</x-panel>