@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm text-zinc-400">{{ $job->employer->name }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-orange-400 text-xl font-bold transition-colors duration-150">
            <a href="{{ $job->url }}" target="_blank">{{ $job->title }}</a>
        </h3>
        <p class="text-sm mt-4 text-zinc-300">{{ $job->schedule }} - For {{ str_ends_with($job->salary, '€') ? $job->salary : $job->salary . '€' }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
            <x-tag :$tag size="small" />
            @endforeach
        </div>
        
        <x-employer-logo :employer="$job->employer" />
    </div>
</x-panel>