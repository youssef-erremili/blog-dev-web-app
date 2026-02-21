@props(['post', 'reading'])

<div
    class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group hover:-translate-y-1 h-auto flex flex-col">
    <!-- Image Section -->
    <div class="relative overflow-hidden h-48">
        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
            src="{{ $post->cover_url }}" alt="{{ $post->title }}" loading="lazy" />

        <!-- Category Badge -->
        <div class="absolute top-4 left-4">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-900 text-white shadow-lg">
                {{ $post->category }}
            </span>
        </div>

        <!-- Reading Time & Views -->
        <div class="absolute bottom-4 left-4 right-4">
            <div class="flex items-center space-x-3">
                <span
                    class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-white bg-opacity-90 text-gray-700 shadow-sm">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $reading }}
                </span>
                <span
                    class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-white bg-opacity-90 text-gray-700 shadow-sm">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                        </path>
                    </svg>
                    {{ number_format($post->views) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="p-6 flex-1 flex flex-col space-y-4">
        <!-- Title -->
        <div>
            <x-url-reader :$post class="group-hover:text-gray-600 transition-colors duration-200">
                <h2
                    class="text-lg font-bold text-gray-900 leading-tight mb-3 group-hover:text-gray-700 transition-colors duration-200">
                    @php
                        $title = Str::length($post->title) < 80 ? $post->title : Str::limit($post->title, 75, '...');
                    @endphp
                    {{ $title }}
                </h2>
            </x-url-reader>
        </div>

        <!-- Content Preview -->
        <div class="flex-1">
            <p class="text-gray-600 text-sm leading-relaxed">
                {{ Str::limit($post->content, 120, '...') }}
            </p>
        </div>

        <!-- Author Section -->
        <div class="mt-auto pt-4 border-t border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <!-- Author Avatar -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('author', ['id' => $post->user->id, 'author' => Str::slug($post->user->name)]) }}"
                            target="_blank" class="block">
                            @if ($post->user->profile_picture === null)
                                <div
                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <span class="text-sm font-semibold text-white uppercase">
                                        {{ Str::limit($post->user->name, 1, '') }}
                                    </span>
                                </div>
                            @else
                                <img class="w-10 h-10 rounded-full object-cover border-2 border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200"
                                    src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                    alt="{{ $post->user->name }}">
                            @endif
                        </a>
                    </div>

                    <!-- Author Info -->
                    <div class="min-w-0 flex-1">
                        <a href="{{ route('author', ['id' => $post->user->id, 'author' => Str::slug($post->user->name)]) }}"
                            target="_blank" class="block">
                            <p
                                class="text-sm font-semibold text-gray-900 truncate hover:text-gray-700 transition-colors duration-200">
                                {{ $post->user->name }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ $post->created_at->format('M j, Y') }}
                            </p>
                        </a>
                    </div>
                </div>

                <!-- Action Menu -->
                <div class="flex-shrink-0 ml-3">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.outside="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
                            <div class="py-2">
                                <x-url-reader :$post
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                    Read Article
                                </x-url-reader>
                                <button
                                    class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                    Save for Later
                                </button>
                                <button
                                    class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                        </path>
                                    </svg>
                                    Share Article
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>