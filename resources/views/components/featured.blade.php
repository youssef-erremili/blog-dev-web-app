@props(['article'])

<div class="overflow-hidden grid grid-cols-4 grid-rows-2 gap-4 place-items-center">
    <div class="col-span-2 row-span-4 relative overflow-hidden h-[27rem] rounded-xl">
        <img src="{{ asset('storage/' . $article[0]->article_cover) }}" class="h-full w-full object-cover rounded-xl" alt="{{ $article[0]->title }}">
        <div class="overflow-hidden rounded-xl absolute bottom-0 left-0 w-full pb-4 pt-10 px-3 bg-gradient-to-t from-black from-20% to-white/0  max-h-40">
            <span class="text-sm text-white rounded-md py-1 px-2 capitalize font-normal inline-block category">{{ $article[0]->category }}</span>
            <a href="{{ url('reader', ['id' => $article[0]->id, 'writer' => Str::slug($article[0]->user->name), 'title' => Str::slug($article[0]->title)]) }}" target="_blank">
                <h1 class="text-white font-semibold text-[24px] capitalize text-wrap py-1">{{ $article[0]->title }}</h1>
            </a>
        </div>
    </div>
    <div class="row-span-2 col-start-3 relative h-52 w-full">
        <div class="overflow-hiiden h-52">
            <img src="{{ asset('storage/' . $article[1]->article_cover) }}" class="h-full w-full object-cover rounded-xl" alt="{{ $article[1]->title }}">
        </div>
        <div class="overflow-hidden rounded-xl absolute bottom-0 left-0 w-full pb-2 pt-2 px-3 bg-gradient-to-t from-gray-950 to-white/0 h-fit">
            <span class="text-xs text-white rounded-md py-1 px-2 capitalize font-normal inline-block category">{{ $article[1]->category }}</span>
            <a href="{{ url('reader', ['id' => $article[1]->id, 'writer' => Str::slug($article[1]->user->name), 'title' => Str::slug($article[1]->title)]) }}" target="_blank">
                <h1 class="text-white font-semibold text-sm capitalize text-wrap py-2">{{ $article[1]->title }}</h1>
            </a>
        </div>
    </div>
    <div class="row-span-2 col-start-3 row-start-3 relative h-52 w-full">
        <div class="overflow-hiiden h-52">
            <img src="{{ asset('storage/' . $article[2]->article_cover) }}" class="h-full w-full object-cover rounded-xl" alt="{{ $article[2]->title }}">
        </div>
        <div class="overflow-hidden rounded-xl absolute bottom-0 left-0 w-full pb-2 pt-2 px-3 bg-gradient-to-t from-gray-950 to-white/0 h-fit">
            <span class="text-xs text-white rounded-md py-1 px-2 capitalize font-normal inline-block category">{{ $article[2]->category }}</span>
            <a href="{{ url('reader', ['id' => $article[2]->id, 'writer' => Str::slug($article[2]->user->name), 'title' => Str::slug($article[2]->title)]) }}" target="_blank">
                <h1 class="text-white font-semibold text-sm capitalize text-wrap py-2">{{ $article[2]->title }}</h1>
            </a>
        </div>
    </div>
    <div class="row-span-2 col-start-4 row-start-1 relative h-52 w-full">
        <div class="overflow-hiiden h-52">
            <img src="{{ asset('storage/' . $article[3]->article_cover) }}" class="h-full w-full object-cover rounded-xl" alt="{{ $article[3]->title }}">
        </div>
        <div class="overflow-hidden rounded-xl absolute bottom-0 left-0 w-full pb-2 pt-2 px-3 bg-gradient-to-t from-gray-950 to-white/0 h-fit">
            <span class="text-xs text-white rounded-md py-1 px-2 capitalize font-normal inline-block category">{{ $article[3]->category }}</span>
            <a href="{{ url('reader', ['id' => $article[3]->id, 'writer' => Str::slug($article[3]->user->name), 'title' => Str::slug($article[3]->title)]) }}" target="_blank">
                <h1 class="text-white font-semibold text-sm capitalize text-wrap py-2">{{ $article[3]->title }}</h1>
            </a>
        </div>
    </div>
    <div class="row-span-2 col-start-4 row-start-3 relative h-52 w-full">
        <div class="overflow-hiiden h-52">
            <img src="{{ asset('storage/' . $article[4]->article_cover) }}" class="h-full w-full object-cover rounded-xl" alt="{{ $article[4]->title }}">
        </div>
        <div class="overflow-hidden rounded-xl absolute bottom-0 left-0 w-full pb-2 pt-2 px-3 bg-gradient-to-t from-gray-950 to-white/0 h-fit">
            <span class="text-xs text-white rounded-md py-1 px-2 capitalize font-normal inline-block category">{{ $article[4]->category }}</span>
            <a href="{{ url('reader', ['id' => $article[4]->id, 'writer' => Str::slug($article[4]->user->name), 'title' => Str::slug($article[4]->title)]) }}" target="_blank">
                <h1 class="text-white font-semibold text-sm capitalize text-wrap py-2">{{ $article[4]->title }}</h1>
            </a>
        </div>
    </div>
</div>