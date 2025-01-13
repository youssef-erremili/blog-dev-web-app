<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <nav class="border-b border-gray-400/30 px-8 py-4 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between items-center">
                <div>
                    <x-logo></x-logo>
                </div>
                <div>
                    <ul class="flex justify-between items-center">
                        <li><x-nav-link href="/">home</x-nav-link></li>
                        <li><x-nav-link>explore</x-nav-link></li>
                        <li><x-nav-link>write</x-nav-link></li>
                        <li><x-nav-link>vision</x-nav-link></li>
                    </ul>
                </div>
                <div class="flex items-center lg:order-2">
                    @auth
                        <x-auth-user></x-auth-user>
                    @endauth
                    @guest
                        <div>
                            <ul class="flex items-center">
                                <li>
                                    <a class="capitalize text-base rounded-md py-2 px-3 mx-2 font-medium text-gray-700" href="{{ route('login') }}">log in</a>
                                </li>
                                <li>
                                    <a class="capitalize text-base rounded-md py-2 px-3 mx-2 font-medium bg-gray-800 text-white" href="{{ route('sign-up') }}">sign up</a>
                                </li>
                            </ul>
                        </div>
                    @endguest
                    <!-- Dropdown menu -->
                </div>
            </div>
        </nav>
    </header>

    <main class="h-screen">
        <div class="mt-16 flex justify-between items-center overflow-hidden">
            <div class="w-[25%] overflow-hidden">
                {{-- <div class="flex items-end -ml-5">
                    <img src="{{ asset('images/header/balon.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
                    <img src="{{ asset('images/header/life-style.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
                    <img src="{{ asset('images/header/style.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
                </div>
                <div class="flex items-start -ml-8 mt-5">
                    <img src="{{ asset('images/header/tech.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
                    <img src="{{ asset('images/header/web-design.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
                    <img src="{{ asset('images/header/website.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
                </div> --}}
            </div>
            <div class="flex-1">
                <div class="text-center ">
                    <h1 class="font-bold text-4xl text-gray-900 capitalize">inside <img src="{{ asset('images/logo.png') }}" class="mr-3 h-10 inline-block" alt="errehub Logo"/>: stories and interviews</h1>
                    <p class="font-normal text-balance mt-1 inline-block text-slate-500 lowercase">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur veritatis sapiente necessitatibus fugiat voluptatum hic magni officia, amet</p>
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
                        <x-category>coding</x-category>
                        <x-category>desgin</x-category>
                        <x-category>software</x-category>
                        <x-category>life style</x-category>
                        <x-category>motivation</x-category>
                    </div>
                </div>
            </div>
            <div class="w-[25%] overflow-hidden">
                {{-- <div class="flex items-end justify-end -mr-8">
                    <img src="{{ asset('images/header/developement.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
                    <img src="{{ asset('images/header/flower.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
                    <img src="{{ asset('images/header/keyboared.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
                </div>
                <div class="flex items-start justify-end -mr-5 mt-5">
                    <img src="{{ asset('images/header/laptop.jpg') }}" class="w-16 h-16 rounded-lg object-cover" alt="image">
                    <img src="{{ asset('images/header/mountain.jpg') }}" class="w-24 h-24 rounded-lg mx-2 object-cover" alt="image">
                    <img src="{{ asset('images/header/nature.jpg') }}" class="w-28 h-28 rounded-lg object-cover" alt="image">
                </div> --}}
            </div>
        </div>
    </main>

    <x-footer></x-footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
