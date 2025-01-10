@props(['users'])

<div class="ml-4 h-fit w-[35%] bg-white py-4 px-4 rounded-2xl border border-gray-200">
    <div class="flex justify-between">
        <h1 class="font-bold text-2xl py-2 text-blue-950">followers</h1>
        <button type="button" class="text-base font-medium capitalize text-indigo-500 mr-4">see all</button>
    </div>
    <div>
        @foreach ($users->following as $follow)
            <div class="flex justify-around items-center py-3 my-1 mx-auto">
                <section class="flex items-center w-[55%]">
                    <img src="{{ asset('storage/' . $follow->author->profile_picture) }}" class="size-9 rounded-full" alt="{{ $follow->author->name }}">
                    <h3 class="text-nowrap font-semibold text-blue-950 text-sm mr-3 ml-2">{{ $follow->author->name}}</h3>
                </section>
                <button type="submit" class="bg-indigo-100 rounded-full text-indigo-600 text-sm py-1 text-nowrap px-2.5 capitalize font-semibold">following</button>
            </div>
        @endforeach
    </div>
</div>