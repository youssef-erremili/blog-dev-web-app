@props(['article_id', 'title', 'image', 'posts' => true, 'date', 'save_id',])

<div class="flex justify-between my-5 py-1 px-2">
    <h2 class="font-medium text-slate-500 text-xl text-center mx-2 w-10">{{ $article_id }}</h2>
    <div class="flex">
        <img src="{{ asset('storage/' . $image) }}" alt="article cover" class="size-20 mx-5 rounded-md">
        <section class="pr-8">
            <p class="text-pretty font-medium text-slate-700">{{ $title }}</p>
            <span class="text-slate-400 font-normal lowercase text-sm mt-1.5 inline-block">saved {{ $date }} </span>
        </section>
    </div>
    <div>
        <div class="bg-red-500 rounded-md">
            <x-form action="{{ route('delete-article', ['id' => $save_id]) }}">
                @method('DELETE')
                <button type="submit" class="flex items-center py-1 px-3">
                    <h3 class="text-sm font-normal text-white capitalize mr-1">unsave</h3>
                </button>
            </x-form>
        </div>
    </div>
    <div class="mx-3.5">
        <div class="bg-indigo-500 rounded-md">
            <button type="submit" class="flex items-center py-1 px-3">
                <a class="text-sm font-normal text-white capitalize" href="">read</a>
            </button>
        </div>
    </div>
</div>
