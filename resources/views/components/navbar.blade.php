<header>
    <nav class="border-b border-gray-400/30 px-8 py-4 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center">
            <div>
                <x-logo></x-logo>
            </div>
            <div>
                <ul class="flex justify-between items-center">
                    <li><x-nav-link href="/">home</x-nav-link></li>
                    <li><x-nav-link href="/hd">explore</x-nav-link></li>
                    <li><x-nav-link href="/hd">write</x-nav-link></li>
                    <li><x-nav-link href="/hd">vision</x-nav-link></li>
                </ul>
            </div>
            <div class="flex items-center lg:order-2">
                @auth
                    <x-auth-user></x-auth-user>
                @endauth
                @guest
                    <div>
                        <ul class="flex items-center">
                            <li>
                                <a class="capitalize text-base rounded-md py-2 px-3 mx-2 font-medium text-gray-700" href="{{ route('login') }}">log in</a>
                            </li>
                            <li>
                                <a class="capitalize text-base rounded-md py-2 px-3 mx-2 font-medium bg-gray-800 text-white" href="{{ route('sign-up') }}">sign up</a>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>