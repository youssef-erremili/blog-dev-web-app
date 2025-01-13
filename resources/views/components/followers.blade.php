@props(['users'])

<div class="flex justify-between items-center">
    <h1 class="text-lg font-bold leading-none text-gray-800 capitalize">latest followers</h1>
    <button type="button" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">View all</button>
</div>
<div>
    @foreach ($users->followers as $follow)
        <div class="flex justify-around items-center py-3 my-1 mx-auto">
            <section class="flex items-center w-[65%]">
                @if ($follow->follower->profile_picture === null)
                    <h2 class="capitalize h-10 w-10 text-center pt-1 rounded-full bg-gray-800 text-lg font-medium text-white">
                        {{ Str::limit($follow->follower->name, 1, '') }}
                    </h2>
                @else
                    <img class="rounded-full h-10 w-10 border-2 border-white" src="{{ asset('storage/' . $follow->follower->profile_picture) }}" alt="{{ $follow->follower->name }}">
                @endif
                <h3 class="text-nowrap font-semibold text-blue-950 text-sm mr-3 ml-2">{{ $follow->follower->name }}</h3>
            </section>
            <x-button-primary class="rounded-full py-[3px]">follow</x-button-primary>
        </div>
    @endforeach
</div>
