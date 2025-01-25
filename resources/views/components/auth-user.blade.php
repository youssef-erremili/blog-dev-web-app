<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
    <div class="relative ml-3" x-data="{ open: false }">
        <button @click="open = !open" type="button" class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <span class="absolute -inset-1.5"></span>
            @if (Auth::user()->profile_picture === null)
                <h2 class="capitalize h-10 w-10 pt-1 rounded-full bg-indigo-500 text-lg font-medium text-white border-2 border-white">
                    {{ Str::limit(Auth::user()->name, 1, '') }}
                </h2>
            @else
                <img class="rounded-full h-12 w-12 border-2 border-white" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}">
            @endif
        </button>
        <x-toggle-navbar></x-toggle-navbar>
    </div>
</div>