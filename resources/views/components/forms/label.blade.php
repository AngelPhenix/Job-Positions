@props(['label', 'name'])

<div class="inline-flex items-center gap-x-2">
    <span class="w-2 h-2 bg-orange-400 inline-block rounded-full"></span>
    <label class="font-bold text-zinc-200" for="{{$name}}">{{$label}}</label>
</div>
