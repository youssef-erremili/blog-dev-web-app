@props(['article_id'])

<div class="flex justify-between my-4">
    <h2 class="font-medium text-slate-500 text-xl text-center mx-2 w-10">{{ $article_id }}</h2>
    <div class="flex">
        <img src="{{ asset('images/test-image.jfif') }}" alt="article cover" class="size-20 mx-5 rounded-md">
        <section class="pr-8">
            <p class="text-pretty font-medium text-slate-700">Lorem ipsum dolor sit amet consectetur. Suscipit sunt harum eveniet minus est et expedita natus dolorum</p>
            <span class="text-slate-500 font-medium text-sm mt-1.5 inline-block">jan 15, 2025</span>
        </section>
    </div>
    <div class="w-28">
        <div class="flex items-center">
            <img src="{{ asset('images/eye-dark.svg') }}" alt="image" class="size-6 rounded-md">
            <h3 class="font-semibold text-slate-700 mx-2 text-lg">8.5k</h3>
        </div>
    </div>
    <div class="w-28 mx-2">
        <div class="flex items-center">
            <img src="{{ asset('images/like.svg') }}" alt="image" class="size-6 rounded-md">
            <h3 class="font-semibold text-slate-700 mx-2 text-lg">73.5k</h3>
        </div>
    </div>
</div>