@props(['bgColor' => 'bg-white'])

<a {{ $attributes }} class="text-gray-800 {{ $bgColor }} shadow text-sm capitalize font-medium py-1 px-4 rounded-2xl mx-1 my-2">
    {{ $slot }}
</a>