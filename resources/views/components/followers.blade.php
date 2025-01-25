@props(['users'])

<div class="flex justify-between items-center">
    <h1 class="text-lg font-bold leading-none text-gray-800 capitalize">followers</h1>
    <button type="button" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">View all</button>
</div>
<div>
    @foreach ($users->followers as $follow)
        <div class="flex justify-between items-center py-3 my-1 mx-auto">
            <section class="flex items-center w-[65%]">
                @if ($follow->follower->profile_picture === null)
                    <h2 class="capitalize h-10 w-10 text-center pt-1.5 rounded-full bg-gray-800 text-lg font-medium text-white">
                        {{ Str::limit($follow->follower->name, 1, '') }}
                    </h2>
                @else
                    <img class="rounded-full h-10 w-10 border-2 border-white" src="{{ asset('storage/' . $follow->follower->profile_picture) }}" alt="{{ $follow->follower->name }}">
                @endif
                <a href="{{ route('author', ['id' => $follow->follower->id, 'author' =>  Str::slug($follow->follower->name)]) }}">
                    <h3 class="text-nowrap font-semibold text-blue-950 text-base  ml-2 capitalize">{{ $follow->follower->name }}</h3>
                </a>
            </section>
            <x-button-primary class="rounded-full py-[3px]">follower</x-button-primary>
        </div>
    @endforeach
</div>
