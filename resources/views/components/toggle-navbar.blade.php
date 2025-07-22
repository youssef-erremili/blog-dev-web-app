<div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="absolute right-0 z-50 mt-2 w-64 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-gray-200 focus:outline-none">

    <!-- User Info Header -->
    <div class="px-4 py-3 border-b border-gray-100">
        <div class="flex items-center space-x-3">
            <!-- Profile Picture -->
            <div class="flex-shrink-0">
                @if (Auth::user()->profile_picture === null)
                    <div class="h-10 w-10 rounded-full bg-gray-900 flex items-center justify-center">
                        <span class="text-sm font-medium text-white uppercase">
                            {{ Str::limit(Auth::user()->name, 1, '') }}
                        </span>
                    </div>
                @else
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-200"
                        src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}">
                @endif
            </div>

            <!-- User Details -->
            <div class="min-w-0 flex-1">
                <p class="text-sm font-semibold text-gray-900 truncate">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-gray-500 truncate">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="py-2">
        <a href="{{ route('overview', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
            <svg class="mr-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Dashboard
        </a>

        <a href="{{ route('publish-blog.create') }}"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200">
            <svg class="mr-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                </path>
            </svg>
            Publish Blog
        </a>
    </div>

    <!-- Divider -->
    <div class="border-t border-gray-100"></div>

    <!-- Sign Out -->
    <div class="py-2">
        <x-form action="{{ route('logout') }}" class="w-full">
            <button type="submit"
                class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 transition-colors duration-200 text-left">
                <svg class="mr-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Sign out
            </button>
        </x-form>
    </div>
</div>