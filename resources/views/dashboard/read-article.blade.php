<x-index-layout>
    <div class="w-2/3 h- my-10 py-10 mx-auto">
        <div class="header">
            <h1 class="capitalize text-3xl text-gray-800 font-bold">{{ $post->title }}</h1>
            <div class="author flex items-center my-10">
                <section>
                    @if ($post->user->profile_picture === null)
                        <h2 class="capitalize text-center h-11 w-11 pt-1.5 rounded-full bg-gray-800 text-lg font-medium text-white border-2 border-white">
                            {{ Str::limit($post->user->name, 1, '') }}
                        </h2>
                    @else
                        <img class="size-11 rounded-full" src="{{ asset('storage/' . $post->user->profile_picture) }}" alt="{{ $post->user->name }}">
                    @endif
                </section>
                <section class="mx-3">
                    <span class="flex"> 
                        <a href="{{ route('author', ['id' => $post->user->id, 'author' =>  Str::slug($post->user->name)]) }}" class="text-gray-700 capitalize font-medium text-base mr-1">{{ $post->user->name }}</a>
                        @auth
                            @if ($post->user->id !== Auth::user()->id)
                                @if ($preventfollow === false)
                                    <x-form action="{{ route('follow', ['authorId' => $post->user->id]) }}">
                                        @method('PUT')
                                        <button type="submit" class="text-green-500 font-medium text-base border-none outline-none capitalize">- follow</button>
                                    </x-form>
                                @elseif ($preventfollow === true)
                                    <x-form action="{{ route('unfollow', ['followId' => $alreadyFollowing->id]) }}">
                                        @method('DELETE')
                                        <button type="submit" class="text-blue-500 font-medium text-base border-none outline-none capitalize">- following</button>
                                    </x-form>
                                @endif
                            @endif
                        @endauth
                    </span>
                    <span class="flex">
                        <p class="text-sm text-slate-500 font-medium">{{ $reading_time }} to read</p>
                        <p class="text-sm text-slate-500 capitalize ml-1 font-medium">- {{ $post->created_at->diffForHumans() }}</p>
                    </span>
                </section>
            </div>
            <div class="attractive flex items-center justify-between py-2.5 border-t-2 border-b-2">
                <section class="flex items-center">
                    <a href="#" >
                        <ion-icon class="text-[23.5px] mr-3 text-slate-900" name="heart-outline"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon class="text-[23.5px] text-slate-900" name="chatbox-outline"></ion-icon>
                    </a>
                </section>
                <section class="flex items-center">
                    @if ($alreadySaved)
                        <x-form action="{{ route('delete-article', ['id'=> $alreadySaved->id]) }}">
                            @method('DELETE')
                            <button type="submit">
                                <img src="{{ asset('images/save.svg') }}" class="w-6" alt="image">
                            </button>
                        </x-form>
                    @else
                        <x-form action="{{ route('save-article', ['id' => $post->id]) }}">
                            @method('PUT')
                            <button type="submit">
                                <ion-icon class="text-[23.5px] text-slate-900" name="bookmark-outline"></ion-icon>
                            </button>
                        </x-form>
                    @endif
                    <a href="#">
                        <ion-icon class="text-[23.5px] ml-3 text-slate-900" name="arrow-redo-outline"></ion-icon>
                    </a>
                </section>
            </div>
        </div>
        <div class="content">
            <div class="w-full">
                <img class="rounded-md h-2/4 object-cover block my-4 mx-auto" src="{{ asset('storage/' . $post->article_cover) }}" alt="{{ $post->title }}">
            </div>
            <article class="text-gray-700 leading-[32px] text-lg font-normal my-7">
                {{ $post->content }}
            </article>
            <div class="tags flex flex-wrap my-10 select-none">
                <h4 class="cursor-pointer bg-slate-200 text-slate-700 rounded-full py-2 px-3 capitalize text-sm font-medium text-nowrap my-2">#{{ $post->tag1 }}</h4>
                <h4 class="cursor-pointer bg-slate-200 text-slate-700 rounded-full py-2 px-3 capitalize text-sm font-medium text-nowrap mx-1.5 my-2">#{{ $post->tag2 }}</h4>
                <h4 class="cursor-pointer bg-slate-200 text-slate-700 rounded-full py-2 px-3 capitalize text-sm font-medium text-nowrap mx-1.5 my-2">#{{ $post->tag3 }}</h4>
                <h4 class="cursor-pointer bg-slate-200 text-slate-700 rounded-full py-2 px-3 capitalize text-sm font-medium text-nowrap mx-1.5 my-2">#{{ $post->tag4 }}</h4>
                <h4 class="cursor-pointer bg-slate-200 text-slate-700 rounded-full py-2 px-3 capitalize text-sm font-medium text-nowrap mx-1.5 my-2">#{{ $post->tag5 }}</h4>
            </div>
        </div>
    </div>
</x-index-layout>