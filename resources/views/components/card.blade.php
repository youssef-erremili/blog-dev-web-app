@props(['post'])

<div class="w-[31%] overflow-hidden my-5 shadow-md border-2 border-slate-200 rounded-2xl shadow-slate-200">
    <div class="p-3">
        <img class="rounded-lg h-60 w-full object-cover" src="{{ asset('storage/' . $post->articale_cover) }}" alt="{{ $post->title }}" />
    </div>
    <div class=" bg-white rounded-b p-4 flex flex-col justify-between leading-normal">
        <div class="mb-4">
            <p class="text-sm text-white rounded-full py-1 px-3 capitalize font-medium my-2 inline-block bg-green-500">
                technology
            </p>
            <div class="text-slate-800 font-bold text-lg capitalize mb-2">{{ $post->title }}</div>
            <p class="text-slate-600 text-base">{{ Str::limit($post->content, 113, '...') }}</p>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('storage/' . Auth::user()->profile_picture ) }}" alt="{{ Auth::user()->name }}">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none capitalize">{{ Auth::user()->name }}</p>
                    <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <a class="bg-indigo-500 py-2 px-2.5 rounded-md flex items-center capitalize font-medium text-sm text-slate-100" href="{{ route('reader', ['id' => $post->id, 'writer' => str_replace(' ', '-', $post->user->name), 'title' => str_replace(' ', '-', $post->title)]) }}" target="_blank">
                read article
                <img src="{{ asset('images/reader-outline.svg') }}" alt="icon" class="size-5 ml-2">
            </a>
        </div>
    </div>
</div>
