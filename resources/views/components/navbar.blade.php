<header>
    <nav class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8 py-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <x-logo></x-logo>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <ul class="flex space-x-1">
                        <li><x-nav-link href="/">home</x-nav-link></li>
                        <li><x-nav-link href="/hd">explore</x-nav-link></li>
                        <li><x-nav-link href="/hd">write</x-nav-link></li>
                        <li><x-nav-link href="/hd">vision</x-nav-link></li>
                    </ul>
                </div>

                <!-- Desktop Auth Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <x-auth-user></x-auth-user>
                    @endauth
                    @guest
                        <a class="text-sm font-medium text-gray-700 hover:text-gray-900 px-4 py-2 rounded-lg transition-colors duration-200"
                            href="{{ route('login') }}">
                            Log in
                        </a>
                        <a class="text-sm font-medium bg-gray-900 text-white hover:bg-gray-800 px-4 py-2 rounded-lg transition-colors duration-200"
                            href="{{ route('sign-up') }}">
                            Sign up
                        </a>
                    @endguest
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button type="button"
                        class="text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 p-2 rounded-lg transition-colors duration-200"
                        aria-controls="mobile-menu" aria-expanded="false" x-data="{ open: false }" @click="open = !open"
                        :aria-expanded="open.toString()">
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu icon -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="md:hidden mt-4 pb-4 border-t border-gray-200" x-data="{ open: false }" x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95" id="mobile-menu">

                <!-- Mobile Navigation Links -->
                <div class="pt-4 pb-3 space-y-1">
                    <x-nav-link href="/" class="block">home</x-nav-link>
                    <x-nav-link href="/hd" class="block">explore</x-nav-link>
                    <x-nav-link href="/hd" class="block">write</x-nav-link>
                    <x-nav-link href="/hd" class="block">vision</x-nav-link>
                </div>

                <!-- Mobile Auth Section -->
                @guest
                    <div class="pt-4 border-t border-gray-200 space-y-2">
                        <a class="block w-full text-center text-sm font-medium text-gray-700 hover:text-gray-900 px-4 py-3 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors duration-200"
                            href="{{ route('login') }}">
                            Log in
                        </a>
                        <a class="block w-full text-center text-sm font-medium bg-gray-900 text-white hover:bg-gray-800 px-4 py-3 rounded-lg transition-colors duration-200"
                            href="{{ route('sign-up') }}">
                            Sign up
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="pt-4 border-t border-gray-200">
                        <x-auth-user></x-auth-user>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>