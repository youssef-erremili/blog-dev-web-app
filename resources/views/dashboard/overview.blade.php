<x-dashboard>
    <div class="bg-custom bg-green-500 w-full rounded-2xl py-10 px-12 inline-block text-white">
        <h2 class="font-bold text-4xl">welcome, {{ Auth::user()->name }}!</h2>
        <p class="text-sm font-normal my-2 first-letter:capitalize lowercase text-wrap">Everything you want know about
            you overviews and your result in weeks is showen here </p>
        <section>
            <a class="inline-flex items-center px-5 py-2.5 text-sm font-medium border-none mt-3 text-center text-white bg-black border-2 rounded-lg"
                href="{{ route('publish-blog.create') }}" target="_blank">
                New article
                <img class="w-3.5 h-3.5 ms-2 rtl:rotate-180" src="{{ asset('images/arrow.svg') }}" alt="icon arrow">
            </a>
        </section>
    </div>
    <div class="mt-14 w-full">
        <h1 class="capitalize font-bold text-3xl text-slate-800">Overview</h1>
        <div class="flex items-center justify-items-center place-items-center flex-wrap w-full overflow-hidden"> 
            <div class="flex items-center rounded-3xl w-[31%] my-4 py-5 px-6 border-2 border-indigo-800 bg-white">
                <div class="block bg-indigo-900 rounded-xl mr-6 py-3 px-3 size-16">
                    <img src="{{ asset('images/eye-outline.svg') }}" alt="icon">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">1390</h2>
                    <p class="font-medium text-sm text-gray-600">total views</p>
                </div>
            </div>
            <div class="flex items-center rounded-3xl w-[31%] my-4 py-5 px-6 border-2 border-green-500 bg-white">
                <div class="block bg-green-600 rounded-xl mr-6 py-3 px-3 size-16">
                    <img src="{{ asset('images/person-outline.svg') }}" alt="icon">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">12,300</h2>
                    <p class="font-medium text-sm text-gray-600">total followers</p>
                </div>
            </div>
            <div class="flex items-center rounded-3xl w-[31%] my-4 py-5 px-6 border-2 border-orange-500 bg-white">
                <div class="block bg-orange-500 rounded-xl mr-6 py-3 px-3 size-16">
                    <img src="{{ asset('images/analytics-outline.svg') }}" alt="icon">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">10.5%</h2>
                    <p class="font-medium text-sm text-gray-600">engagement rate</p>
                </div>
            </div>
            <div class="flex items-center rounded-3xl w-[31%] my-4 py-5 px-6 border-2 border-sky-500 bg-white">
                <div class="block bg-sky-500 rounded-xl mr-6 py-3 px-3 size-16">
                    <img src="{{ asset('images/reader-outline.svg') }}" alt="icon">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">87</h2>
                    <p class="font-medium text-sm text-gray-600">published article</p>
                </div>
            </div>
            <div class="flex items-center justify-self-start rounded-3xl w-[31%] my-4 py-5 px-6 border-2 border-violet-500 bg-white">
                <div class="block bg-violet-500 rounded-xl mr-6 py-3 px-3 size-16">
                    <img src="{{ asset('images/time-outline.svg') }}" alt="icon">
                </div>
                <div>
                    <h2 class="font-bold text-2xl">12</h2>
                    <p class="font-medium text-sm text-gray-600">pending article</p>
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
