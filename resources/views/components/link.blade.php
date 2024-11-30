@props(['link' => '#', 'is_active' => false])
<a href="{{ $link }}" {{ $attributes->merge(['class' => $is_active ? 'text-sm underline' : 'text-sm']) }}" wire:navigate>{{ $slot }}</a>
