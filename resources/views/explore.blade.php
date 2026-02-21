<x-app-layout>
    <div class="min-h-screen bg-gray-50">

        {{-- Hero --}}
        <div class="bg-white border-b border-gray-200 py-14">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Explore Articles</h1>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">Browse stories, ideas, and knowledge from writers across every topic.</p>
            </div>
        </div>

        {{-- Category Filter Pills --}}
        <div class="bg-white border-b border-gray-100 sticky top-0 z-10 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-hide">
                    <a href="{{ route('explore') }}"
                       class="flex-shrink-0 px-4 py-1.5 rounded-full text-sm font-medium transition-all duration-200 {{ !$activeCategory ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        All
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('explore', ['category' => $cat->category]) }}"
                           class="flex-shrink-0 px-4 py-1.5 rounded-full text-sm font-medium capitalize transition-all duration-200 {{ $activeCategory === $cat->category ? 'bg-gray-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            {{ $cat->category }}
                            <span class="ml-1 text-xs opacity-60">{{ $cat->posts_count }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Articles Grid --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if($posts->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $index => $post)
                        <x-card :$post :reading="$reading_time[$index]"/>
                    @endforeach
                </div>
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-24">
                    <div class="w-20 h-20 mx-auto mb-5 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No articles found</h3>
                    <p class="text-gray-500">There are no articles in this category yet.</p>
                    <a href="{{ route('explore') }}" class="inline-block mt-6 px-6 py-2.5 bg-gray-900 text-white text-sm font-medium rounded-xl hover:bg-gray-800 transition-colors duration-200">Browse All</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
