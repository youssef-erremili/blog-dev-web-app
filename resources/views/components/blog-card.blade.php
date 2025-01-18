@props(['post'])

<article class="my-10 bg-white border border-slate-100 shadow shadow-gray-200 h-72 group grid w-full rounded-2xl grid-cols-1 md:grid-cols-8 overflow-hidden">
    <div class="col-span-3 h-48 mt-12 overflow-hidden rounded-2xl ml-7">
        <img src="{{ asset('storage/' . $post->articale_cover ) }}"
            class="h-full w-3/4 rounded-2xl object-cover transition duration-700 ease-out group-hover:scale-105"
            alt="{{ $post->title }}" />
    </div>
    <div class="flex flex-col justify-center p-2 col-span-5">
        <small class="mb-4 font-medium">Artificial Intelligence</small>
        <h3 class="text-balance text-xl font-bold text-neutral-800 lg:text-2xl">{{ $post->title }}</h3>
        <p id="articleDescription" class="my-4 max-w-lg text-pretty text-gray-700 text-sm">{{ Str::limit($post->content, 200, '...') }}</p>
        <a href="{{ route('reader', ['id' => $post->id, 'writer' => str_replace(' ', '-', $post->user->name), 'title' => str_replace(' ', '-', $post->title)]) }}" target="_Blank" class="capitalize w-fit font-medium bg-gray-800 rounded-lg text-white py-2 px-5">
            Read article
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="2.5" aria-hidden="true" class="inline size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</article>