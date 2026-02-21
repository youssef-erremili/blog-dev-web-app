@props(['save', 'loop'])

<div class="flex justify-between my-5 pt-2 pb-4 px-2 border-b last:border-none">
    <div class="flex">
        <h2 class="font-medium text-slate-700 text-xl text-center mx-2 basis-10">{{ $loop }}</h2>
        <div class="flex">
            <img src="{{ $save->article->cover_url }}" alt="article cover"
                class="size-20 mx-5 rounded-md">
            <section class="basis-full">
                <p class="text-pretty font-medium text-slate-700 block">{{ $save->article->title }}</p>
                <span class="text-gray-400 font-normal text-sm mt-1.5 inline-flex">
                    by <p class="text-gray-500 font-medium capitalize px-1">{{ $save->article->user->name }}</p>
                    saved for {{ $save->created_at->diffForHumans() }}
                </span>
            </section>
        </div>
    </div>
    <div class="flex justify-center ml-16">
        <div class="mx-3.5">
            <a class="py-1.5 px-3 capitalize inline-block leading-relaxed bg-gray-800 rounded-md text-white text-sm font-normal"
                href="{{ url('reader', ['id' => $save->article->id, 'writer' => Str::slug($save->article->user->name), 'title' => Str::slug($save->article->title)]) }}"
                target="_blank">
                view
            </a>
        </div>
        <div>
            <x-form action="{{ route('delete-article', ['id' => $save->id]) }}">
                @method('DELETE')
                <button type="submit">
                    <span class="py-1.5 px-3 capitalize inline-block leading-relaxed bg-red-600 rounded-md text-white text-sm font-normal">unsave</span>
                </button>
            </x-form>
        </div>
    </div>
</div>
