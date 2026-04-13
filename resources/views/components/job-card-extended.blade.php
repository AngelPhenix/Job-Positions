@props(['job'])

<x-panel class="flex gap-x-6">
    <div class="flex-1 flex flex-col">
        <a href="{{ $job->url }}" class="self-start text-sm text-zinc-400">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-orange-400 transition-colors duration-150">
            <a href="{{ $job->url }}" target="_blank">{{ $job->title }}</a>
        </h3>

        <p class="text-sm text-zinc-400 mt-auto">{{ $job->schedule }} - For {{ str_ends_with($job->salary, '€') ? $job->salary : $job->salary . '€' }}</p>
    </div>

    <div class="self-start">
        @foreach($job->tags as $tag)
        <x-tag :$tag />
        @endforeach
    </div>
</x-panel>