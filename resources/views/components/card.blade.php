@props(['post', 'reading'])

<div class="w-[30%] mt-7 py-5 overflow-hidden shadow border bg-white border-gray-100 rounded-3xl shadow-slate-200">
    <div class="px-1 relative">
    <img class="rounded-2xl block mx-auto h-44 w-11/12 object-cover" src="{{ asset('storage/' . $post->article_cover) }}" alt="{{ $post->title }}" />
        <span class="category absolute bottom-2 left-7 text-sm text-white rounded-lg py-1 px-2 capitalize font-normal inline-block">
            {{ $post->category }}
        </span>
    </div>
    <div class="bg-white rounded-b px-5 py-3 flex flex-col justify-between leading-normal">
        @php
            $title = Str::length($post->title) < 64 ? $post->title : Str::limit($post->title, 50, '...');
        @endphp
        <div class="mb-2">
            <div class="flex">
                <span class="text-gray-400 text-sm font-medium flex items-center">
                    <img src="{{ asset('images/history.svg') }}" class="size-5 mr-1" alt="icon">
                    {{ $reading }}
                </span>
                <span class="text-gray-400 text-sm font-medium flex items-center ml-4">
                    <img src="{{ asset('images/eye-dark.svg') }}" class="size-5 mr-1" alt="icon">
                    {{ $post->views }}
                </span>
            </div>
            <x-url-reader :$post>
                <h1 class="h-16 text-slate-800/90 font-semibold text-[17px] capitalize text-wrap py-2">{{ $title }}</h1>
            </x-url-reader>
            <p class="text-slate-600 lowercase text-sm">{{ Str::limit($post->content, 100, '...') }}</p>
        </div>
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <div class="mr-1">
                    @if ($post->user->profile_picture === null)
                        <h2 class="capitalize h-11 text-center w-11 pt-1.5 rounded-full bg-gray-800 text-lg font-medium text-white border-2 border-white">
                            {{ Str::limit($post->user->name, 1, '') }}
                        </h2>
                    @else
                        <img class="rounded-full h-12 w-12 border-2 border-white" src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="{{ $post->user->name }}">
                    @endif
                </div>
                <div class="text-sm capitalize mt-1">
                    <a href="{{ route('author', ['id' => $post->user->id, 'author' =>  Str::slug($post->user->name)]) }}" target="_blank">
                        <p class="text-gray-800 leading-none font-medium">{{ $post->user->name }}</p>
                    </a>
                    <p class="text-gray-500">{{ $post->created_at->toFormattedDateString() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
