<x-index-layout>
    <x-hero></x-hero>
    <div class="w-[93%] mx-auto">
        <x-featured></x-featured>
        <div class="my-14 h-auto">
            <section>
                <h1 class="text-2xl font-bold text-gray-700 capitalize">latest articles</h1>
            </section>
        </div>
    </div>

    
    
    {{-- error --}}
    {{-- <div class="animate flex items-center py-4 px-4 max-w-[28rem] fixed top-4 z-[999] right-5 text-sm border-l-4 rounded shadow-sm bg-red-50 border-red-500">
        <span class="inline-block mx-2">
            <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <p class="text-red-500 font-normal text-base text-pretty leading-relaxed capitalize mr-6">your account has been deleted</p>
        <button class="hide ml-4 inline-flex rounded-md text-slate-400 hover:text-slate-500 focus:outline-none">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="#dc2626" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    </div> --}}

    {{-- success --}}
    {{-- <div class="animate flex items-center py-4 px-4 max-w-[28rem] fixed top-4 z-[999] right-5 text-sm border-l-4 rounded shadow-sm bg-green-50 border-green-500">
        <span class="inline-block mx-2">
            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <p class="text-green-500 font-normal text-base text-pretty leading-relaxed capitalize mr-6">your account has been deleted</p>
        <button class="hide ml-4 inline-flex rounded-md text-slate-400 hover:text-slate-500 focus:outline-none">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="#16a34a" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    </div> --}}

    {{-- info --}}
    {{-- <div class="animate flex items-center py-4 px-4 max-w-[28rem] fixed top-4 z-[999] right-5 text-sm border-l-4 rounded shadow-sm bg-blue-50 border-blue-500">
        <span class="inline-block mx-2">
            <svg class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
        </span>
        <p class="text-blue-500 font-normal text-base text-pretty leading-relaxed capitalize mr-6">your account has been deleted</p>
        <button class="hide ml-4 inline-flex rounded-md text-slate-400 hover:text-slate-500 focus:outline-none">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="#2563eb" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    </div> --}}

    {{-- warning --}}
    {{-- <div class="animate flex items-center py-4 px-4 max-w-[28rem] fixed top-4 z-[999] right-5 text-sm border-l-4 rounded bg-yellow-50 border-yellow-400">
        <span class="inline-block mx-2">
            <svg class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        </span>
        <p class="text-yellow-500 font-normal text-base text-pretty leading-relaxed capitalize mr-6">your account has been deleted</p>
        <button class="hide ml-4 inline-flex rounded-md text-slate-400 hover:text-slate-500 focus:outline-none">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="#eab308" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg>
        </button>
    </div> --}}

    {{-- <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <svg class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
    </svg>
    <svg class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
    </svg>
    <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg> --}}



    {{-- <div class="flex items-center justify-around">
            <div class="w-[30%] mt-7 py-5 overflow-hidden shadow border bg-white border-gray-100 rounded-3xl shadow-slate-200">
                <div class="px-1 relative">
                <img class="rounded-lg block mx-auto h-44 w-11/12 object-cover" src="{{ asset('images/test-image.jfif') }}" alt="" />
                    <span class="absolute bottom-2 left-7 text-sm text-white rounded-lg py-1 px-2 capitalize font-normal inline-block bg-gray-800">
                        technology
                    </span>
                </div>
                <div class="bg-white rounded-b px-5 py-3 flex flex-col justify-between leading-normal">
                    <div class="mb-2">
                        @php
                            $original_title = "thuis hdh dtiitle yt d jdn jkdn djdn dhdkjbsd dskjbs djkdf hdfhf kjdnjk dkjbd djkbfkd djkbfdjk djkfb";
                            $title = Str::length($original_title) < 82 ? $original_title : Str::limit($original_title, '74', '...');
                            echo Str::length($title);
                            echo '</br>';
                            echo Str::length($original_title);
                        @endphp
                        <a href="">
                            <h1 class="h-16 text-slate-800/90 font-semibold text-[17px] capitalize py-2">{{ $title }}</h1>
                        </a>
                        <p class="text-slate-600 lowercase text-sm">{{ Str::limit('sjkas sjkdd djkaskjd sdkjbsakjd asjkbdhello dhhdlo dhhdlodjkdajksd hh kdj kjndk kjdnjk ekjeb jkekejb kjbdkj dkjbajksbd asdjkbjsda d jkbasdkjbaskd sajkdbas dkasbjd asdkjb', 90, '.') }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full mr-4 ring-2 ring-blue-600" src="{{ asset('storage/' . Auth::user()->profile_picture ) }}" alt="{{ Auth::user()->name }}">
                            <div class="text-sm">
                                <p class="text-gray-800 leading-none capitalize font-semibold">{{ Auth::user()->name }}</p>
                                <p class="text-slate-500 font-medium text-sm capitalize">{{ Auth::user()->created_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
</x-index-layout>
