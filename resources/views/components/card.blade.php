@props(['post'])

<div class="max-w-sm my-4 w-full shadow-md border-2 border-indigo-500 rounded-md shadow-indigo-100">
    <div class="overflow-hidden">
        <img class="" src="{{ asset('storage/' . $post->articale_cover) }}" alt="{{ $post->title }}" />
    </div>
    <div class=" bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <p class="text-sm text-white rounded-full py-1 px-4 capitalize font-medium my-2 inline-block bg-indigo-600">
                technology
            </p>
            <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>
            <p class="text-gray-700 text-base">{{ Str::limit($post->content, 200, '.') }}</p>
        </div>
        <div class="flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('storage/' . Auth::user()->profile_picture ) }}" alt="{{ $post->title }}">
            <div class="text-sm">
                <p class="text-gray-900 leading-none capitalize">{{ Auth::user()->name }}</p>
                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>
