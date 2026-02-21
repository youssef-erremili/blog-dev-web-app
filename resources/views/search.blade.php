<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        {{-- Search Hero --}}
        <div class="bg-white border-b border-gray-200 py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <x-search-hero :$query></x-search-hero>

                @if(isset($query))
                    <p class="text-center text-gray-500 mt-4">
                        Showing results for <span class="font-semibold text-gray-900">"{{ $query }}"</span>
                        &mdash; <span class="font-semibold text-gray-900">{{ $lastPost->total() }}</span> {{ Str::plural('article', $lastPost->total()) }} found
                    </p>
                @endif
            </div>
        </div>

        {{-- Results --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            @if($lastPost->count())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($lastPost as $index => $post)
                        <x-card :$post :reading="$reading_time[$index]"/>
                    @endforeach
                </div>
                <div class="mt-12 flex justify-center">
                    {{ $lastPost->links() }}
                </div>
            @else
                <div class="text-center py-24">
                    <div class="w-20 h-20 mx-auto mb-5 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No results found</h3>
                    <p class="text-gray-500">We couldn't find anything matching "{{ $query }}". Try different keywords.</p>
                    <a href="{{ route('explore') }}" class="inline-block mt-6 px-6 py-2.5 bg-gray-900 text-white text-sm font-medium rounded-xl hover:bg-gray-800 transition-colors duration-200">Browse All Articles</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
