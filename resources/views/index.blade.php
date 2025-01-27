<x-index-layout>
    <x-hero></x-hero>
    <div class="w-[94%] mx-auto">
        <div class="mt-12">
            <h1 class="text-3xl font-bold text-gray-700 capitalize mb-5">editor's choice</h1>
            <x-featured :article="$topArticle"></x-featured>
        </div>
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
</x-index-layout>
