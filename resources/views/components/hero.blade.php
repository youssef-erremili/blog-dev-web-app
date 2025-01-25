<div class="flex justify-between items-center overflow-hidden bg-gray-50/90 py-24">
    <div class="w-[25%] overflow-hidden">
        <div class="flex items-end -ml-5">
            <img src="{{ asset('images/header/balon.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
            <img src="{{ asset('images/header/life-style.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
            <img src="{{ asset('images/header/style.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
        </div>
        <div class="flex items-start -ml-8 mt-5">
            <img src="{{ asset('images/header/tech.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
            <img src="{{ asset('images/header/web-design.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
            <img src="{{ asset('images/header/website.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
        </div>
    </div>
    <div class="flex-1">
        <div class="text-center ">
            <h1 class="font-bold text-3xl align-bottom text-nowrap text-gray-900 capitalize">inside <img src="{{ asset('images/logo.png') }}" class="mr-3 h-10 inline-block" alt="errehub Logo"/>: Real Stories, Inspiring Voices</h1>
            <p class="font-normal mt-1 inline-block text-slate-500 lowercase text-wrap w-3/4">A platform where stories and interviews reveal authentic experiences and valuable insights</p>
        </div>
        <div class="mt-4">
            <form action="#" method="get">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3.5">
                        <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input type="text" class="ps-10 pe-16 py-3 block w-full bg-white border border-gray-200 rounded-full text-sm focus:outline-none" placeholder="Search">
                    <div class="absolute inset-y-0 end-0 flex items-center pe-1">
                        <x-button-primary class="rounded-3xl">search</x-button-primary>
                    </div>
                </div>
            </form>
            <div class="flex items-center justify-center flex-wrap my-5">
                <x-category href="/dd">coding</x-category>
                <x-category href="/dd">desgin</x-category>
                <x-category href="/dd">software</x-category>
                <x-category href="/dd">life style</x-category>
                <x-category href="/dd">motivation</x-category>
            </div>
        </div>
    </div>
    <div class="w-[25%] overflow-hidden">
        <div class="flex items-end justify-end -mr-8">
            <img src="{{ asset('images/header/developement.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
            <img src="{{ asset('images/header/flower.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
            <img src="{{ asset('images/header/keyboared.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
        </div>
        <div class="flex items-start justify-end -mr-5 mt-5">
            <img src="{{ asset('images/header/laptop.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
            <img src="{{ asset('images/header/mountain.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
            <img src="{{ asset('images/header/nature.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
        </div>
    </div>
</div>