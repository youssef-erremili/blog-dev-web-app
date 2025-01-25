<ol class="flex items-center whitespace-nowrap mt-1 mb-5 capitalize">
    <li class="inline-flex items-center">
        <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
            href="{{ route("overview", ['author' => str_replace(' ', '-', Auth::user()->name)]) }}">
            dashboard
        </a>
        <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
        </svg>
    </li>
    <li class="inline-flex items-center bg-indigo-100 py-1 px-2 rounded-md text-sm font-semibold text-indigo-500 truncate" aria-current="page">
        <a href="{{ Route::currentRouteName() }}">{{ Route::currentRouteName() }}</a>
    </li>
</ol>
