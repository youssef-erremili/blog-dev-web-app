<x-app-layout>
    {{-- ===================== HERO ===================== --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20">
        <div class="absolute inset-0 opacity-10"
             style="background-image: url('https://picsum.photos/seed/explore/1600/600'); background-size: cover; background-position: center;">
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block px-3 py-1 text-xs font-semibold tracking-widest text-gray-300 uppercase border border-gray-600 rounded-full mb-6">Discover</span>
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white leading-tight mb-5">
                Ideas Worth <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Reading</span>
            </h1>
            <p class="text-lg text-gray-400 max-w-xl mx-auto">
                Explore {{ $posts->total() }} published stories across {{ count($categories) }} topics — written by our community of thinkers and creators.
            </p>
        </div>
    </section>

    {{-- ===================== CATEGORY PILLS (styled scroll) ===================== --}}
    <div class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative">
                {{-- Left fade --}}
                <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-8 bg-gradient-to-r from-white to-transparent z-10"></div>
                {{-- Right fade --}}
                <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-8 bg-gradient-to-l from-white to-transparent z-10"></div>

                <div class="flex items-center gap-2 overflow-x-auto py-4 px-4
                            [&::-webkit-scrollbar]:h-1
                            [&::-webkit-scrollbar-track]:bg-gray-100
                            [&::-webkit-scrollbar-track]:rounded-full
                            [&::-webkit-scrollbar-thumb]:bg-gray-300
                            [&::-webkit-scrollbar-thumb]:rounded-full
                            [&::-webkit-scrollbar-thumb:hover]:bg-gray-500">
                    <a href="{{ route('explore') }}"
                       class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200
                              {{ !$activeCategory ? 'bg-gray-900 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-900 hover:text-white' }}">
                        All
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('explore', ['category' => $cat->category]) }}"
                           class="flex-shrink-0 px-5 py-2 rounded-full text-sm font-medium capitalize transition-all duration-200
                                  {{ $activeCategory === $cat->category ? 'bg-gray-900 text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-900 hover:text-white' }}">
                            {{ $cat->category }}
                            <span class="ml-1 text-xs {{ $activeCategory === $cat->category ? 'text-gray-300' : 'text-gray-400' }}">{{ $cat->posts_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== ARTICLES ===================== --}}
    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

            @if($posts->count())
                {{-- Active category label --}}
                @if($activeCategory)
                    <div class="flex items-center gap-3 mb-8">
                        <span class="text-2xl font-bold text-gray-900 capitalize">{{ $activeCategory }}</span>
                        <span class="px-3 py-1 bg-gray-200 text-gray-600 text-sm rounded-full">{{ $posts->total() }} {{ Str::plural('article', $posts->total()) }}</span>
                        <a href="{{ route('explore') }}" class="ml-auto text-sm text-gray-500 hover:text-gray-900 flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            Clear filter
                        </a>
                    </div>
                @endif

                {{-- First article: featured/wide --}}
                @if(!$activeCategory && $posts->currentPage() === 1)
                    @php $featured = $posts->first(); @endphp
                    <div class="group relative overflow-hidden rounded-3xl mb-10 border border-gray-100 bg-white shadow-sm hover:shadow-xl transition-all duration-500">
                        <div class="flex flex-col lg:flex-row">
                            <div class="lg:w-1/2 overflow-hidden">
                                <img src="{{ $featured->cover_url }}"
                                     alt="{{ $featured->title }}"
                                     class="w-full h-64 lg:h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                                <span class="inline-block px-3 py-1 text-xs font-semibold text-blue-700 bg-blue-50 rounded-full capitalize mb-4">{{ $featured->category }}</span>
                                <x-url-reader :post="$featured">
                                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight mb-4 group-hover:text-gray-600 transition-colors duration-200">
                                        {{ $featured->title }}
                                    </h2>
                                </x-url-reader>
                                <p class="text-gray-500 mb-6 line-clamp-3">{{ Str::limit(strip_tags($featured->content), 180) }}</p>
                                <div class="flex items-center gap-3">
                                    @if($featured->user->profile_picture)
                                        <img src="{{ asset('storage/' . $featured->user->profile_picture) }}" class="w-9 h-9 rounded-full object-cover" alt="{{ $featured->user->name }}">
                                    @else
                                        <div class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center text-white text-sm font-bold">{{ strtoupper(substr($featured->user->name, 0, 1)) }}</div>
                                    @endif
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $featured->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $featured->created_at->format('M j, Y') }} · {{ $reading_time[0] ?? '3 min read' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Remaining posts in 3-col grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts->slice(1) as $index => $post)
                            <x-card :$post :reading="$reading_time[$index + 1] ?? '3 min read'"/>
                        @endforeach
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($posts as $index => $post)
                            <x-card :$post :reading="$reading_time[$index] ?? '3 min read'"/>
                        @endforeach
                    </div>
                @endif

                {{-- Pagination --}}
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>

            @else
                <div class="text-center py-28">
                    <div class="w-20 h-20 mx-auto mb-6 bg-white rounded-full border border-gray-200 flex items-center justify-center shadow-sm">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">No articles in this topic yet</h3>
                    <p class="text-gray-500 mb-8">Be the first to write about <span class="font-semibold capitalize">{{ $activeCategory }}</span>.</p>
                    <div class="flex items-center justify-center gap-4">
                        <a href="{{ route('explore') }}" class="px-6 py-3 text-sm font-medium border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors">Browse All</a>
                        @auth
                            <a href="{{ route('publish-blog.create') }}" class="px-6 py-3 text-sm font-semibold bg-gray-900 text-white rounded-xl hover:bg-gray-800 transition-colors">Write an article</a>
                        @endauth
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
