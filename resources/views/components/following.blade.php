@props(['users'])

<div class="flex justify-between">
    <h1 class="text-lg font-bold leading-none text-gray-800 mt-3 capitalize">following</h1>
    <button type="button" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">View all</button>
</div>
<div>
    @foreach ($users->following as $follow)
        <div class="flex justify-between items-center py-3 my-1 mx-auto">
            <section class="flex items-center">
                @if ($follow->author->profile_picture === null)
                    <h2 class="capitalize h-10 w-10 text-center pt-1.5 inline-block rounded-full bg-gray-800 text-lg font-medium text-white">
                        {{ Str::limit($follow->author->name, 1, '') }}
                    </h2>
                @else
                    <img class="rounded-full h-10 w-10 border-2 border-white" src="{{ asset('storage/' . $follow->author->profile_picture) }}" alt="{{ $follow->author->name }}">
                @endif
                <a href="{{ route('author', ['id' => $follow->author->id, 'author' =>  Str::slug($follow->author->name)]) }}" target="_blank">
                    <h3 class="text-nowrap font-semibold text-blue-950 text-base ml-2 capitalize">{{ $follow->author->name }}</h3>
                </a>
            </section>
            <x-button-primary class="rounded-full">following</x-button-primary>
        </div>
    @endforeach
</div>

