<x-dashboard>
    <div class="bg-custom bg-green-500 w-full rounded-2xl py-10 px-12 inline-block text-white">
        <h2 class="font-bold text-4xl">welcome, {{ Auth::user()->name }}!</h2>
        <p class="text-sm font-normal my-2 first-letter:capitalize lowercase text-wrap">Everything you want know about you overviews and your result in weeks is showen here </p>
        <section>
            <a class="inline-flex items-center px-5 py-2.5 text-sm font-medium border-none mt-3 text-center text-white bg-black border-2 rounded-lg" href="{{ route('publish-blog.create') }}" target="_blank">
                New article
                <img class="w-3.5 h-3.5 ms-2 rtl:rotate-180" src="{{ asset('images/arrow.svg') }}" alt="icon arrow">
            </a>
        </section>
    </div>
    <div class="mt-14">
        <h1 class="capitalize font-bold text-3xl text-slate-900">Overview</h1>
        <div class="flex items-center justify-around">
            <div class="flex items-center rounded-lg w-2/6 my-4 bg-violet-300 py-5 px-6 shadow-lg shadow-violet-400">
                <div class="block bg-indigo-900 rounded-xl mr-6 py-3 px-3 size-16">
                    <img class="fill-slate-500" src="{{ asset('images/eye-outline.svg') }}" alt="eye outline">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">1390</h2>
                    <p class="font-medium text-sm">total views</p>
                </div>
            </div>
            <div class="flex items-center rounded-lg w-2/6 my-4 bg-green-300 py-5 px-6 shadow-lg shadow-green-400 mx-6">
                <div class="block bg-green-900 rounded-xl mr-6 py-3 px-3 size-16">
                    <img class="fill-slate-500" src="{{ asset('images/person-outline.svg') }}" alt="person outline">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">12,300</h2>
                    <p class="font-medium text-sm">total followers</p>
                </div>
            </div>
            <div class="flex items-center rounded-lg w-2/6 my-4 bg-red-300 py-5 px-6 shadow-lg shadow-red-400">
                <div class="block bg-red-900 rounded-xl mr-6 py-3 px-3 size-16">
                    <img class="fill-slate-500" src="{{ asset('images/analytics-outline.svg') }}" alt="analytics outline">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">10.5%</h2>
                    <p class="font-medium text-sm">engagement rate</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-slate-100 rounded-lg py-6 px-7 mt-10">
        <div class="flex justify-between">
            <h1 class="capitalize font-medium text-2xl text-slate-800">top articles</h1>
            <select name="" id="" class="bg-transparent outline-none cursor-pointer">
                <option value="">Month</option>
                <option value="">motnhs</option>
                <option value="">motnhs</option>
            </select>
        </div>
        <div class="my-6">
            <x-top-article article_id="01"></x-top-article>
            <x-top-article article_id="02"></x-top-article>
            <x-top-article article_id="03"></x-top-article>
            <x-top-article article_id="04"></x-top-article>
            <x-top-article article_id="05"></x-top-article>
        </div>
    </div>
</x-dashboard>