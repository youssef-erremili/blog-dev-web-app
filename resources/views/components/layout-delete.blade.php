<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medium blog hhhhlayout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="bg-white py-1.5 shadow-md">
            ljksdnflknsdflkns
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-between">
                        <div class="flex shrink-0 items-center">
                            <img class="h-12  w-auto" src="{{ asset('images/errehub-wight.webp') }}" alt="Your Company">
                        </div>
                        <div class="sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                @auth
                                    <a href="{{ route('overview', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}"  class="rounded-md bg-slate-900 px-3 py-2 text-[17px] font-medium text-white">Dashboard</a>
                                @endauth
                                <a href="#" class="rounded-md px-3 py-2 text-[17px] font-semibold text-slate-700 hover:bg-slate-100">Team</a>
                                <a href="#" class="rounded-md px-3 py-2 text-[17px] font-semibold text-slate-700 hover:bg-slate-100">Projects</a>
                                <a href="#" class="rounded-md px-3 py-2 text-[17px] font-semibold text-slate-700 hover:bg-slate-100">Calendar</a>
                            </div>
                        </div>
                        @auth
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                                <!-- Profile dropdown -->
                                <div class="relative ml-3" x-data="{ open: false }">
                                    <div>
                                        <button @click="open = !open" type="button" class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600">
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
                        @endauth
                        @guest
                            <div>
                                <ul class="flex items-center">
                                    <li>
                                        <x-nav-link href="{{ route('login') }}">log in</x-nav-link>
                                    </li>
                                    <li>
                                        <x-nav-link href="{{ route('sign-up') }}">sign up</x-nav-link>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            @auth
                <div class="sm:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <a href="{{ route('overview', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}"  class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a>
                        <a href="{{ route('profile', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                        <a href="{{ route('article', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
                        <a href="{{ route('chat', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
                    </div>
                </div>
            @endauth
        </nav>
    </header>
    <main class="w-[90%] min-h-screen mx-auto py-4 px-2">
        {{-- {{ $slot }} --}}
    </main>
    <x-footer></x-footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
