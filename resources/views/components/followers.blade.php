@props(['users'])

<div class="ml-4 h-auto w-[35%] bg-white py-4 px-4 rounded-2xl border border-gray-200">
    <h1 class="font-bold text-2xl py-2 text-blue-950">latest followers</h1>
    <div>
        @foreach ($users->followers as $follow)
            <div class="flex justify-around items-center py-2">
                <p class="text-lg font-semibold text-slate-800">{{ $loop->iteration }}.</p>
                <section class="flex items-center w-[55%]">
                    <img src="{{ asset('storage/' . $follow->follower->profile_picture) }}" class="size-9 rounded-full" alt="{{ $follow->follower->name }}">
                    <h3 class="text-nowrap font-semibold text-blue-950 text-sm mr-3 ml-2">{{ $follow->follower->name}}</h3>
                </section>
                <button type="submit" class="bg-red-100 rounded-full text-red-600 text-sm py-1 text-nowrap px-2.5 capitalize font-semibold">follow back</button>
            </div>
        @endforeach
    </div>
</div>