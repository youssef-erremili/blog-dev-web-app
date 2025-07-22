<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medium blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Add cloak styles -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body>
    <!-- Alpine.js root component -->
    <div x-data="{ sidebarOpen: false }" x-cloak>
        <main class="min-h-screen">
            <!-- Navigation -->
            <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 shadow-sm">
                <div class="px-3 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center justify-start">
                            <!-- Mobile Menu Button -->
                            <button @click="sidebarOpen = !sidebarOpen" type="button"
                                class="mr-2 inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition-all duration-200">
                                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                    </path>
                                </svg>
                            </button>
                            <x-logo></x-logo>
                        </div>
                        <x-auth-user></x-auth-user>
                    </div>
                </div>
            </nav>

            <!-- Sidebar -->
            <aside id="logo-sidebar"
                class="fixed top-0 left-0 z-40 w-52 h-screen pt-20 transition-transform duration-300 ease-in-out bg-white border-r border-gray-200 sm:translate-x-0"
                :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
                <div class="h-full px-3 pb-4 overflow-y-auto bg-white" style="scroll-behavior: smooth;">
                    <ul class="space-y-2 font-medium py-2 px-4">
                        <li class="mb-6">
                            <h3 class="font-medium text-gray-800 text-2xl">Dashboard</h3>
                        </li>
                        <x-side-nav-link url="overview">overview</x-side-nav-link>
                        <x-side-nav-link url="article">article</x-side-nav-link>
                        <x-side-nav-link url="profile">Profile</x-side-nav-link>
                        <x-side-nav-link url="chat">chat</x-side-nav-link>
                    </ul>
                </div>
            </aside>

            <!-- Mobile Sidebar Overlay -->
            <div x-show="sidebarOpen" 
                 x-cloak
                 @click="sidebarOpen = false"
                 x-transition:enter="transition-opacity ease-linear duration-300" 
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-30 bg-gray-900 bg-opacity-50 sm:hidden"></div>

            <!-- Main Content -->
            <div class="p-6 sm:ml-52 mt-2">
                <div class="py-8 px-6 border border-slate-200 rounded-lg mt-14 bg-white shadow-sm">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Close sidebar when clicking nav links on mobile
            const sidebarLinks = document.querySelectorAll('aside a[href]');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (window.innerWidth < 640) {
                        // Find the Alpine component and close sidebar
                        const alpineEl = document.querySelector('[x-data]');
                        if (alpineEl && alpineEl._x_dataStack && alpineEl._x_dataStack[0]) {
                            alpineEl._x_dataStack[0].sidebarOpen = false;
                        }
                    }
                });
            });

            // Close sidebar on window resize to desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 640) {
                    const alpineEl = document.querySelector('[x-data]');
                    if (alpineEl && alpineEl._x_dataStack && alpineEl._x_dataStack[0]) {
                        alpineEl._x_dataStack[0].sidebarOpen = false;
                    }
                }
            });

            // Ensure Alpine is properly initialized
            document.addEventListener('alpine:init', () => {
                console.log('Alpine.js initialized successfully');
            });
        });
    </script>
</body>

</html>