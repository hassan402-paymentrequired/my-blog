<button class="relative flex text-sm bg-transparent " wire:click='filter'>
    <span>{{ $title }}</span>
    @if ($active)
    <span class="absolute left-[50%] right-[50%] w-2 h-2 mt-2 translate-x-[50%] bg-black rounded-full -bottom-2"></span>
    @endif
</button>
