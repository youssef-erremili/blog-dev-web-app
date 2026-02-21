<x-app-layout>
    <x-hero></x-hero>

    {{-- Trending Posts Section --}}
    <x-trending-posts :posts="$trendingPosts" :readingTimes="$trending_reading_time"></x-trending-posts>

    <div class="w-[94%] mx-auto">
        {{-- Editor's Choice (Featured) --}}
        <div class="mt-12">
            <h1 class="text-3xl font-bold text-gray-700 capitalize mb-5">editor's choice</h1>
            <x-featured :article="$topArticle"></x-featured>
        </div>
    </div>

    {{-- Browse by Category --}}
    <x-categories-section :categories="$categories"></x-categories-section>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Recent Blog Articles --}}
        <div class="py-20">
            <div class="text-center mb-12">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Recent Blog Articles</h1>
                <p class="text-gray-500 mt-2">Stay up to date with the latest stories from our community</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($lastPost as $index => $post)
                    <x-card :$post :reading="$reading_time[$index]"/>
                @endforeach
            </div>
            <div class="mt-12 flex justify-center">
                {{ $lastPost->links() }}
            </div>
        </div>
    </div>

    {{-- Top Authors Section --}}
    <x-top-authors :authors="$topAuthors"></x-top-authors>

    {{-- Newsletter CTA --}}
    <x-newsletter></x-newsletter>
</x-app-layout>

