<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Profile Header -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                    <div class="relative">
                        <div class="h-32 sm:h-40 bg-gradient-to-r from-slate-100 to-slate-200"></div>
                        <div class="absolute -bottom-12 left-6">
                            @if ($user->profile_picture === null)
                                <div
                                    class="w-24 h-24 bg-slate-800 rounded-full flex items-center justify-center border-4 border-white shadow-sm">
                                    <span class="text-2xl font-semibold text-white">
                                        {{ Str::limit($user->name, 1, '') }}
                                    </span>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}"
                                    class="w-24 h-24 rounded-full border-4 border-white shadow-sm object-cover">
                            @endif
                        </div>
                    </div>

                    <div class="pt-16 pb-6 px-6">
                        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                            <div class="space-y-1">
                                <h1 class="text-2xl font-bold text-gray-900 capitalize">{{ $user->name }}</h1>
                                <p class="text-gray-600">{{ $user->role }}</p>
                                @if($user->location)
                                    <p class="text-sm text-gray-500 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $user->location }}
                                    </p>
                                @endif
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="text-center px-4 py-2 bg-gray-50 rounded-lg">
                                    <div class="text-lg font-semibold text-gray-900">{{ $user->followers->count() }}
                                    </div>
                                    <div class="text-xs text-gray-500">Followers</div>
                                </div>
                                <div class="text-center px-4 py-2 bg-gray-50 rounded-lg">
                                    <div class="text-lg font-semibold text-gray-900">{{ $total }}</div>
                                    <div class="text-xs text-gray-500">Articles</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 mt-6">
                            <button
                                class="px-6 py-2 bg-slate-900 text-white text-sm font-medium rounded-lg hover:bg-slate-800 transition-colors">
                                Follow
                            </button>
                            <button
                                class="px-6 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                                Message
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Overview Section -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Overview</h2>
                    <div class="prose prose-gray max-w-none">
                        <h3 class="text-base font-medium text-gray-800 mb-2">Summary</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $user->bio }}</p>
                    </div>
                </div>

                <!-- Articles Section -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Recent Articles</h2>
                        <span class="text-sm text-gray-500">{{ $posts->count() }} articles</span>
                    </div>

                    <div class="space-y-6">
                        @foreach ($posts as $index => $post)
                            <x-blog-card :$post :reading="$reading_time[$index]" />
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Followers Widget -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <x-followers width="w-full" :users="$user" />
                </div>

                <!-- Additional Details -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Details</h3>
                        @auth
                            @if (Auth::user()->id === $user->id)
                                <button class="text-sm text-gray-500 hover:text-gray-700 transition-colors">
                                    Edit
                                </button>
                            @endif
                        @endauth
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-5 h-5 mt-0.5">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 3.26a2 2 0 001.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Email</p>
                                <p class="text-sm text-gray-900 truncate">{{ $user->email }}</p>
                            </div>
                        </div>

                        @if($user->location)
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-5 h-5 mt-0.5">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 0a9 9 0 019-9m-9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Location</p>
                                    <p class="text-sm text-gray-900">{{ $user->location }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-5 h-5 mt-0.5">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h2a2 2 0 012 2v1m-6 0h6m-6 0l-.5 8.5A2 2 0 009.5 18h5a2 2 0 002-1.5L16.5 7H7.5" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Joined</p>
                                <p class="text-sm text-gray-900">{{ $user->created_at->toFormattedDateString() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>