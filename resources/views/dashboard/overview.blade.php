<x-dashboard>
    <x-breadcrumb />
    <div class="flex justify-between">
        <div class="w-[70%] bg-custom bg-green-500 rounded-2xl py-10 px-12 inline-block text-white">
            <h2 class="font-bold text-4xl capitalize">welcome, {{ Auth::user()->name }}!</h2>
            <p class="text-sm font-normal my-2 first-letter:capitalize lowercase text-wrap">Everything you want know about
                you overviews and your result in weeks is showen here </p>
            <section>
                <a class="inline-flex items-center px-5 py-2.5 text-sm font-medium border-none mt-3 text-center text-white bg-gray-900 border-2 rounded-lg"
                    href="{{ route('publish-blog.create') }}" target="_blank">
                    New article
                    <img class="w-3.5 h-3.5 ms-2 rtl:rotate-180" src="{{ asset('images/arrow.svg') }}" alt="icon arrow">
                </a>
            </section>
        </div>
        <div class="ml-4 h-fit w-[40%] bg-white py-4 px-4 rounded-2xl border border-gray-200">
            <x-followers :users="$users"></x-followers>
        </div>
    </div>
    <div class="mt-14 border border-gray-200 py-4 px-4 rounded-2xl">
        <x-title-author class="text-2xl ml-7 mt-0 pt-4">Overview</x-title-author>
        <div class="flex justify-around w-full mt-6">
            <div class="flex flex-wrap justify-around items-center capitalize overflow-hidden"> 
                <div class="flex items-center rounded-3xl w-[40%] py-5 px-6 border-2 border-indigo-800 bg-white">
                    <div class="block bg-indigo-900 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/eye-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">{{ Auth::user()->views }}</h2>
                        <p class="font-medium text-sm text-gray-600 text-nowrap">profile views</p>
                    </div>
                </div>
                <div class="flex items-center rounded-3xl w-[40%] py-5 px-6 border-2 border-red-500 bg-white">
                    <div class="block bg-red-500 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/person-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">{{ $users->followers->count() }}</h2>
                        <p class="font-medium text-sm text-gray-600">followers</p>
                    </div>
                </div>
                <div class="flex items-center rounded-3xl w-[40%] my-4 py-5 px-6 border-2 border-red-500 bg-white">
                    <div class="block bg-red-500 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/person-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">{{ $users->following->count() }}</h2>
                        <p class="font-medium text-sm text-gray-600">following</p>
                    </div>
                </div>
                <div class="flex items-center rounded-3xl w-[40%] my-4 py-5 px-6 border-2 border-orange-500 bg-white">
                    <div class="block bg-orange-500 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/analytics-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">10.5%</h2>
                        <p class="font-medium text-sm text-gray-600 text-nowrap">engagement rate</p>
                    </div>
                </div>
                <div class="flex items-center rounded-3xl w-[40%] my-4 py-5 px-6 border-2 border-sky-500 bg-white">
                    <div class="block bg-sky-500 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/reader-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">{{ $posts }}</h2>
                        <p class="font-medium text-sm text-gray-600 text-nowrap">published article</p>
                    </div>
                </div>
                <div class="flex items-center justify-self-start rounded-3xl w-[40%] my-4 py-5 px-6 border-2 border-violet-500 bg-white">
                    <div class="block bg-violet-500 rounded-xl mr-6 py-3 px-3 size-16">
                        <img src="{{ asset('images/time-outline.svg') }}" alt="icon">
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl">{{ $pending }}</h2>
                        <p class="font-medium text-sm text-gray-600 text-nowrap">pending article</p>
                    </div>
                </div>
            </div>
            <div class="ml-3 h-fit w-[65%] bg-white py-4 px-4 rounded-2xl border border-gray-200">
                <x-following :users="$users"></x-following>
            </div>
        </div>
    </div>
    <div class="mt-14 border border-gray-200 py-4 px-4 rounded-2xl">
        <div class="flex justify-between">
            <h1 class="font-medium text-2xl first-letter:capitalize text-gray-700">top articles</h1>
            <select name="" id="" class="bg-transparent outline-none cursor-pointer">
                <option value="">Month</option>
                <option value="">motnhs</option>
                <option value="">motnhs</option>
            </select>
        </div>
        <div class="my-6">
            @forelse ($topArticle as $article)
                <x-top-article :$article :loop="$loop->iteration" />
            @empty
                <p class="text-base text-slate-600 font-medium text-center mt-10">Start making big success</p>
            @endforelse          
        </div>
    </div>
</x-dashboard>
