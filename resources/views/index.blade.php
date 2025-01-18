<x-index-layout>
    <x-hero></x-hero>
    <div class="my-14 px-5 h-auto">
        {{-- <section>
            <h1 class="text-2xl font-bold text-gray-700 capitalize">latest articles</h1>
        </section>
        
        <div class="flex items-center justify-around">
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
