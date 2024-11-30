@props(['type' => 'text'])
<input type="{{ $type }}" {{ $attributes->merge(['class'=>" w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  sm:text-sm/6"]) }} {{ $slot }} >
