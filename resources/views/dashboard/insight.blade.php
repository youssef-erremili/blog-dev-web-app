<x-dashboard>
    <div class="bg-orange-500 min-w-72 rounded-2xl py-6 px-6 inline-block text-white">
        <h2 class="font-bold text-2xl">hello, {{ Auth::user()->name }}</h2>
        <p class="text-sm my-2 capitalize">Everything you want know about you insights and your result in weeks is showen here </p>
    </div>
    <div class="mt-4">
        <h1 class="capitalize font-semibold text-2xl text-slate-800">insights</h1>
        <div class="flex items-center justify-around">
            <div class="rounded-lg w-2/6 my-4 bg-slate-50 py-4 px-6 border border-slate-200">
                <h2 class="font-medium">total views</h2>
                <span>645 follower</span>
            </div>
            <div class="rounded-lg w-2/6 my-4 bg-slate-50 py-4 px-6 border border-slate-200 mx-2">total followers</div>
            <div class="rounded-lg w-2/6 my-4 bg-slate-50 py-4 px-6 border border-slate-200">engagement rate</div>
        </div>
    </div>
</x-dashboard>