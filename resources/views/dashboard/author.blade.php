<x-app-layout>
    <div class="flex mx-auto mt-14 px-16">
        <div class="overflow-hidden w-[70%]">
            <div class="relative pt-40 pb-24 border rounded-xl overflow-hidden border-gray-200 m-2">
                <img src="{{ asset('images/header/nature.jpg') }}" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
                    <div class=" overflow-hidden sm:justify-start relative z-10">
                        @if ($user->profile_picture === null)
                            <h2 class="capitalize h-32 w-32 text-center pt-7 mt-4 rounded-full bg-gray-800 text-6xl font-medium text-white border-4 border-solid border-white">
                                {{ Str::limit($user->name, 1, '') }}
                            </h2>
                        @else
                            <img src="{{ asset('storage/' . $user->profile_picture ) }}" alt="{{ $user->name }}" class="w-40 h-40 border-4 bg-white shadow border-solid border-white rounded-full object-cover">
                        @endif
                    </div>
                    <div class="flex flex-col sm:flex-row max-sm:gap-5 items-center justify-between mb-5">
                        <div class="block">
                            <h1 class="font-manrope font-bold text-4xl text-gray-900 mb-1 capitalize">{{ $user->name }}</h1>
                            <p class="font-medium text-base leading-7 text-gray-500 capitalize">{{ $user->role }}</p>
                            <p class="font-medium text-base leading-7 text-gray-500 capitalize">{{ $user->location }}</p>
                        </div>
                        <div class="rounded-lg py-3.5 px-5 flex items-center">
                            <div class="flex ">
                                <section
                                    class="bg-gray-800/5 px-7 py-6 rounded-xl font-medium text-base leading-7 text-gray-700">
                                    <h2 class="font-medium text-xl text-gray-900">{{ $user->followers->count() }}</h2>
                                    <p class="capitalize text-base text-slate-500">folllowers</p>
                                </section>
                                <section
                                    class="ml-4 bg-gray-800/5 px-7 py-6 rounded-xl font-medium text-base leading-7 text-gray-700">
                                    <h2 class="font-medium text-xl text-gray-900">{{ $total }}</h2>
                                    <p class="capitalize text-base text-slate-500">articles</p>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row max-lg:gap-5 items-center justify-between py-0.5">
                        <div class="flex items-center gap-4">
                            <button class="capitalize py-2 px-9 rounded-3xl bg-blue-950 text-white font-normal text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-100 hover:bg-indigo-700">
                                follow
                            </button>
                            <button class="capitalize py-2 px-9 rounded-3xl bg-indigo-100 text-indigo-600 font-semibold text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-100">message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <x-title-author>overview</x-title-author>
                <div class="mt-5 border rounded-xl border-gray-200 py-2 px-4">
                    <h3 class="capitalize text-base pt-4 font-semibold text-slate-700">summary</h3>
                    <x-desc-author>{{ $user->bio }}</x-desc-author>
                </div>
            </div>
            <div class="mt-8">
                <x-title-author>articles</x-title-author>
                <div class="mt-5 border rounded-xl border-gray-200 py-2 px-4">
                    <h3 class="capitalize text-base pt-4 font-semibold text-slate-700">latest articles</h3>
                    <x-desc-author>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus soluta nam laudantium, aliquid ducimus adipisci</x-desc-author>
                    @foreach ($posts as $index => $post)
                        <x-blog-card :$post :reading="$reading_time[$index]"/>
                    @endforeach
                    <div class="my-7">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="h-fit overflow-hidden w-[30%] ml-6 m-2">
            <div class="w-full py-5 px-5 h-fit border-gray-200 border rounded-xl">                
                <x-followers width="w-full" :users="$user"></x-followers>
            </div>
            <div class="w-full py-5 px-5 h-fit border-gray-200 border rounded-xl mt-10">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-lg font-bold leading-none text-gray-900 capitalize">additional details</h5>
                    @auth
                        @if (Auth::user()->id === $user->id)
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        @endif
                    @endauth
                </div>
                <div class="flex items-center mt-9">
                    <section>
                        <img src="{{ asset('images/mail.svg') }}" alt="icon" class="size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium text-sm uppercase text-gray-400">email address</p>
                        <span class="text-cyan-500 font-medium">{{ $user->email }}</span>
                    </section>
                </div>
                <div class="flex items-center mt-5">
                    <section>
                        <img src="{{ asset('images/globe.svg') }}" alt="icon" class="size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium text-sm uppercase text-gray-400">country</p>
                        <span class="text-cyan-500 capitalize font-medium">{{ $user->location }}</span>
                    </section>
                </div>
                <div class="flex items-center mt-5">
                    <section>
                        <img src="{{ asset('images/calendar.svg') }}" alt="icon" class="stroke-red-500 size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium uppercase text-sm text-gray-400">join date</p>
                        <span class="text-gray-700 font-medium">{{ $user->created_at->toFormattedDateString() }}</span>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
