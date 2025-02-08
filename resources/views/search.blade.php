<x-app-layout>
    <div class="w-[94%] mx-auto">
        <div class="bg-red-500 p-10">
            {{ $query }}
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
</x-app-layout>
