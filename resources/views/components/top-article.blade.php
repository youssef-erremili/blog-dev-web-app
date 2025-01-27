@props(['article', 'loop'])

<div class="flex justify-between my-5 pt-2 pb-4 px-2 border-b last:border-none">
    <div class="flex">
        <h2 class="font-medium text-slate-700 text-xl text-center mx-2 basis-10">{{ $loop }}</h2>
        <div class="flex">
            <img src="{{ asset('storage/' . $article->article_cover) }}" alt="article cover"
                class="size-20 mx-5 rounded-md">
            <section class="basis-full">
                <p class="font-medium text-slate-700 block">{{ $article->title }}</p>
                <span class="text-gray-400 font-normal capitalize text-sm mt-1.5 inline-flex">
                    {{ $article->created_at->toFormattedDateString() }}
                </span>
            </section>
        </div>
    </div>
    <div class="flex justify-center ml-16">
        <div class="flex items-start mr-3">
            <section class="inline-flex items-center">
                <img src="{{ asset('images/eye-dark.svg') }}" class="size-6" alt="icon">
                <span class="font-medium text-gray-700 ml-1 text-lg">{{ $article->views }}</span>
            </section>
            <section class="inline-flex items-center ml-3">
                <img src="{{ asset('images/like.svg') }}" class="size-5" alt="icon">
                <span class="font-medium text-gray-700 ml-1 text-lg">{{ $article->views }}</span>
            </section>
        </div>
        <div class="mx-3.5">
            <a class="py-1.5 px-3 capitalize inline-block leading-relaxed bg-gray-800 rounded-md text-white text-sm font-normal"
                href="{{ url('reader', ['id' => $article->id, 'writer' => Str::slug($article->user->name), 'title' => Str::slug($article->title)]) }}"
                target="_blank">
                view
            </a>
        </div>
    </div>
</div> 