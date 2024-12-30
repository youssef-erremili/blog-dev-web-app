<div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 min-w-48 origin-top-right rounded-md bg-white px-1 pt-2 pb-4 shadow-lg ring-1 ring-black/5 focus:outline-none">
    <h1 class="px-4 py-2 text-base capitalize font-bold text-gray-700">{{ Auth::user()->name }}</h1>
    <p class="ml-2 block px-4 py-2 text-sm text-gray-700">{{ Auth::user()->email }}</p>
    <a href="{{ route('overview', ['author' => str_replace(' ', '-', Auth::user()->name)]) }}"  class="my-2 w-48 ml-6 block bg-slate-100 rounded-md px-4 py-2 text-sm font-medium text-slate-700">Dashboard</a>
    <a href="{{ route('publish-blog.create') }}" class="my-2 w-48 ml-6 block bg-slate-100 rounded-md px-4 py-2 text-sm font-medium text-slate-700">Publish Blog</a>
    <x-form action="{{ route('logout') }}">
        <button type="submit" class="my-2 w-48 ml-6 block bg-slate-100 text-left rounded-md px-4 py-2 text-sm font-medium text-slate-700">
            Sign out
        </button>
    </x-form>
</div>
