@props(['post', 'reading'])

<article class="my-10 bg-white border border-slate-100 shadow shadow-gray-200 h-72 group grid w-full rounded-2xl grid-cols-1 md:grid-cols-8 overflow-hidden">
    <div class="col-span-3 h-48 mt-12 overflow-hidden rounded-2xl ml-7">
        <img src="{{ asset('storage/' . $post->articale_cover) }}"
            class="h-full w-3/4 rounded-2xl object-cover transition duration-700 ease-out group-hover:scale-105"
            alt="{{ $post->title }}" />
    </div>
    <div class="flex flex-col justify-center p-2 col-span-5">
        @php
            $title = Str::length($post->title) < 64 ? $post->title : Str::limit($post->title, 64, '..');
        @endphp
        <div class="flex items-center mb-3">
            <small class="font-medium text-indigo-600 bg-indigo-700/20 rounded-md px-2 py-1 w-fit">{{ $post->category }}</small>
            <div class="flex ml-4">
                <span class="text-gray-400 text-sm font-medium flex items-center">
                    <img src="{{ asset('images/history.svg') }}" class="size-5 mr-1" alt="icon">
                    {{ $reading }}
                </span>
                <span class="text-gray-400 text-sm font-medium flex items-center ml-4">
                    <img src="{{ asset('images/eye-dark.svg') }}" class="size-5 mr-1" alt="icon">
                    {{ $post->views }}
                </span>
            </div>
        </div>
        <h3 class="text-balance text-xl font-bold text-gray-800 lg:text-2xl">{{ $title }}</h3>
        <p id="articleDescription" class="my-4 max-w-lg text-pretty text-gray-700 text-sm">
            {{ Str::limit($post->content, 140, '...') }}</p>
        <x-url-reader :$post class="bg-gray-800 rounded-lg text-white py-2 px-5 inline-block w-fit">
            Read article
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="2.5" aria-hidden="true" class="inline size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </x-url-reader>
    </div>
</article>
