@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">GovExec</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-100">Web Developer</h3>
        <p class="text-sm mt-4">Full Time - From 40,000€</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
            <x-tag :$tag size="small" />
            @endforeach
        </div>
        
        <x-employer-logo :width="40"/>
    </div>
</x-panel>