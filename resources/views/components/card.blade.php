@props(['post'])

<div class="w-[30%] mt-7 py-5 overflow-hidden shadow border bg-white border-gray-100 rounded-3xl shadow-slate-200">
    <div class="px-1 relative">
    <img class="rounded-lg block mx-auto h-44 w-11/12 object-cover" src="{{ asset('storage/' . $post->articale_cover) }}" alt="{{ $post->title }}" />
        <span class="absolute bottom-2 left-7 text-sm text-white rounded-lg py-1 px-2 capitalize font-normal inline-block bg-gray-800">
            technology
        </span>
    </div>
    <div class="bg-white rounded-b px-5 py-3 flex flex-col justify-between leading-normal">
        @php
            $title = Str::length($post->title) < 64 ? $post->title : Str::limit($post->title, 65, '...');
        @endphp
        <div class="mb-2">
            <a class="lowercase" href="{{ Str::lower(url('reader', ['id' => $post->id, 'writer' => str_replace(' ', '-', $post->user->name), 'title' => str_replace(' ', '-', $post->title)])) }}" target="_blank">
                <h1 class="h-16 text-slate-800/90 font-semibold text-[17px] capitalize text-wrap py-2">{{ $title }}</h1>
            </a>
            <p class="text-slate-600 lowercase text-sm">{{ Str::limit($post->content, 90, '.') }}</p>
        </div>
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4 ring-2 ring-blue-600" src="{{ asset('storage/' . Auth::user()->profile_picture ) }}" alt="{{ Auth::user()->name }}">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none capitalize font-medium">{{ Auth::user()->name }}</p>
                    <p class="text-gray-500 text-sm capitalize">{{ $post->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
