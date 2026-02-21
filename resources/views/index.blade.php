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

    <div class="w-[94%] mx-auto">
        {{-- Recent Blog Articles --}}
        <div class="mt-20 mb-10 h-auto w-full">
            <section>
                <h1 class="text-xl font-semibold text-gray-700 capitalize">Recent blog articles</h1>
            </section>
            <div class="flex items-center justify-between flex-wrap">
                @foreach ($lastPost as $index => $post)
                    <x-card :$post :reading="$reading_time[$index]"/>
                @endforeach
            </div>
            <div class="my-10 w-2/3 mx-auto flex justify-center">
                {{ $lastPost->links() }}
            </div>
        </div>
    </div>

    {{-- Top Authors Section --}}
    <x-top-authors :authors="$topAuthors"></x-top-authors>

    {{-- Newsletter CTA --}}
    <x-newsletter></x-newsletter>
</x-app-layout>

