<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" type="button"
        class="flex items-center space-x-3 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-300 hover:bg-gray-50 transition-all duration-200"
        :class="{ 'bg-gray-50': open }">

        <!-- Profile Picture/Avatar -->
        <div class="flex-shrink-0">
            @if (Auth::user()->profile_picture === null)
                <div class="h-8 w-8 sm:h-10 sm:w-10 rounded-full bg-gray-900 flex items-center justify-center">
                    <span class="text-sm sm:text-base font-medium text-white uppercase">
                        {{ Str::limit(Auth::user()->name, 1, '') }}
                    </span>
                </div>
            @else
                <img class="h-8 w-8 sm:h-10 sm:w-10 rounded-full object-cover border-2 border-gray-200"
                    src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}">
            @endif
        </div>

        <!-- User Info (Hidden on mobile) -->
        <div class="hidden sm:block text-left min-w-0 flex-1">
            <p class="text-sm font-medium text-gray-900 truncate">
                {{ Auth::user()->name }}
            </p>
            <p class="text-xs text-gray-500 truncate">
                {{ Auth::user()->email }}
            </p>
        </div>

        <!-- Chevron Icon -->
        <div class="flex-shrink-0">
            <svg class="h-4 w-4 text-gray-400 transition-transform duration-200" :class="{ 'rotate-180': open }"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </button>

    <!-- Dropdown Menu -->
    <x-toggle-navbar></x-toggle-navbar>
</div>