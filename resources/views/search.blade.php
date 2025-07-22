<x-app-layout>
    <div class="w-[94%] mx-auto">
        <div>
            <!-- Hero -->
            <x-search-hero :$query></x-search-hero>
            <div class="flex items-center text-xl capitalize text-gray-900 font-medium">
                <h2 class="text-xl capitalize text-gray-800 font-medium">result for : </h2>
                <p class="text-xl capitalize text-gray-600 font-medium ml-2">
                    @isset($query)
                    {{ $query }}
                @endisset
                </p>
            </div>
        </div>
        <div class="mt-20 mb-10 h-auto w-full">
            <section>
                <h1 class="text-xl font-semibold text-gray-700 capitalize">Recent blog articles</h1>
            </section>
            <div class="flex items-center justify-between flex-wrap">
                @foreach ($lastPost as $index => $post)
                    <x-card :$post :reading="$reading_time[$index]" />
                @endforeach
            </div>
            <div class="my-10 w-2/3 mx-auto flex justify-center">
                {{ $lastPost->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
