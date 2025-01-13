@props(['image', 'url'])

<a {{ $attributes }} class="{{ request()->is("$url") ? 'bg-indigo-500 text-white font-semibold' : ''}} capitalize flex items-center py-2.5 px-3 text-sm font-medium text-gray-600 rounded-lg dark:text-white">
    <img src='{{ asset(request()->is("$url") ? "/images/$image-white.svg" : "/images/$image.svg") }}' class="w-5 h-5 ml-1" alt="icon">
    <span class="ml-2">{{ $slot }}</span>
</a>
