@php
    $isRoute = Route::currentRouteName() === $url;
    $imgFull = "";
    if ($isRoute) {
        $imgFull = "images/$url-white.svg";
    } else {
        $imgFull = "images/$url.svg";
    }
    
@endphp


<li class="{{ Route::currentRouteName() === "$url" ? 'bg-gray-800 *:text-white rounded-lg shadow-md shadow-gray-400' : '' }}">
    <a href="{{ route("$url", ['author' => str_replace(' ', '-', Auth::user()->name)]) }}" class="flex items-center font-medium text-sm py-3 px-5 text-gray-600">
        <img src="{{ asset("$imgFull") }}" class="w-4" :alt="$url">
        <span class="flex-1 ms-3 whitespace-nowrap capitalize">{{ $slot }}</span>
    </a>
</li>