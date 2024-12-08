<x-layout>
    <div class="w-2/3 h- my-10 py-10 mx-auto">
        <div class="header">
            <h1 class="capitalize text-4xl text-slate-950 font-bold">{{ $post->title }}</h1>
            <div class="author flex items-center my-10">
                <section>
                    <img class="size-11 rounded-full" src="{{ asset('storage/' . $post->user->profile_picture ) }}" alt="profile">
                </section>
                <section class="mx-3">
                    <span class="flex"> 
                        <a href="#" class="text-slate-700 capitalize font-medium text-base mr-1">{{ $post->user->name }} -</a>
                        <a href="#" class="text-emerald-500 font-medium text-base">Follow</a>
                    </span>
                    <span class="flex">
                        <p class="text-sm text-slate-500 font-medium">{{ $reading_time }}</p>
                        <p class="text-sm text-slate-500 capitalize ml-1 font-medium">- {{ $post->updated_at->diffForHumans() }}</p>
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
                    <a href="#">
                        <ion-icon class="text-[23.5px] text-slate-900" name="bookmark-outline"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon class="text-[23.5px] ml-3 text-slate-900" name="arrow-redo-outline"></ion-icon>
                    </a>
                </section>
            </div>
        </div>
        <div class="content">
            <div class="w-full">
                <img class="rounded-md h-2/4 object-cover block my-4 mx-auto" src="{{ asset('storage/' . $post->articale_cover) }}" alt="{{ $post->title }}">
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
</x-layout>