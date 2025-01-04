<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medium blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="min-h-screen">
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
            <div class="px-3 py-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="{{ route('home') }}" class="flex ms-2 md:me-24">
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Medium blog</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center mr-4">
                            <div class="relative ml-3" x-data="{ open: false }">
                                <div>
                                    <button @click="open = !open" type="button"
                                        class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                        <span class="absolute -inset-1.5"></span>
                                        @if (Auth::user()->profile_picture === null)
                                            <h2 class="capitalize h-10 w-10 pt-1 rounded-full bg-indigo-500 text-lg font-medium text-white border-2 border-white">{{ Str::limit(Auth::user()->name, 1, '') }}</h2>
                                        @else
                                            <img class="rounded-full h-10 w-10 border-2 border-white" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="profile">
                                        @endif
                                    </button>
                                </div>
                                <!-- Dropdown menu -->
                                <x-toggle-navbar></x-toggle-navbar>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-52 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium py-2 px-4">
                    <li class="mb-6">
                        <h3 class="font-medium text-indigo-600 text-2xl">Dashboard</h3>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'overview' ? 'bg-indigo-500 *:text-white rounded-lg' : '' }}">
                        <a href="{{ route('overview', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="flex items-center font-medium text-sm py-3 px-5 text-gray-600">
                            <img src="{{ asset('images/overview.svg') }}" class="w-4" alt="overview">
                            <span class="flex-1 ms-3 whitespace-nowrap">Overview</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'profile' ? 'bg-indigo-500 *:text-white rounded-lg' : '' }}">
                        <a href="{{ route('profile', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="flex items-center font-medium text-sm py-3 px-5 text-gray-600">
                            <img src="{{ asset('images/profile.svg') }}" class="w-4" alt="profile">
                            <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'article' ? 'bg-indigo-500 *:text-white rounded-lg' : '' }}">
                        <a href="{{ route('article', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="flex items-center font-medium text-sm py-3 px-5 text-gray-600">
                            <img class="w-4" src="{{ asset('images/article.svg') }}" alt="article">
                            <span class="flex-1 ms-3 whitespace-nowrap">Article</span>
                        </a>
                    </li>
                    <li class="{{ Route::currentRouteName() === 'chat' ? 'bg-indigo-500 *:text-white rounded-lg' : '' }}">
                        <a href="{{ route('chat', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="flex items-center font-medium text-sm py-3 px-5 text-gray-600">
                            <img src="{{ asset('images/chat.svg') }}" class="w-4" alt="chat">
                            <span class="flex-1 ms-3 whitespace-nowrap">Message</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="p-6 sm:ml-52 mt-2">
            <div class="py-8 px-6 border border-slate-200 capitalize rounded-lg mt-14">
                {{ $slot }}
            </div>
        </div>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
