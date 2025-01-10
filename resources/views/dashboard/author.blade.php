<x-layout>
    <div class="flex mx-auto mt-14">
        <div class="overflow-hidden w-[70%]">
            <div class="relative pt-40 pb-24 border rounded-xl overflow-hidden border-gray-200 m-2">
                <img src="https://pagedone.io/asset/uploads/1705473378.png" alt="cover-image"
                    class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
                <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
                    <div class="flex items-center justify-center sm:justify-start relative z-10 mb-5">
                        <img src="https://pagedone.io/asset/uploads/1705471668.png" alt="user-avatar-image"
                            class="border-4 border-solid border-white rounded-full object-cover">
                    </div>
                    <div class="flex flex-col sm:flex-row max-sm:gap-5 items-center justify-between mb-5">
                        <div class="block">
                            <h1 class="font-manrope font-bold text-4xl text-gray-900 mb-1 capitalize">youssef erremili</h1>
                            <p class="font-normal text-base leading-7 text-gray-500 capitalize">author</p>
                            <p class="font-normal text-base leading-7 text-gray-500">Los Anbeles, California</p>
                        </div>
                        <div class="rounded-lg py-3.5 px-5 flex items-center">
                            <div class="flex ">
                                <section
                                    class="bg-indigo-50 px-7 py-6 rounded-xl font-medium text-base leading-7 text-gray-700">
                                    <h2 class="font-medium text-lg text-gray-900">435</h2>
                                    <p class="capitalize text-base text-slate-500">folllowers</p>
                                </section>
                                <section
                                    class="ml-4 bg-indigo-50 px-7 py-6 rounded-xl font-medium text-base leading-7 text-gray-700">
                                    <h2 class="font-medium text-lg text-gray-900">22</h2>
                                    <p class="capitalize text-base text-slate-500">articles</p>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row max-lg:gap-5 items-center justify-between py-0.5">
                        <div class="flex items-center gap-4">
                            <button
                                class="capitalize py-2 px-9 rounded-3xl bg-blue-950 text-white font-normal text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-100 hover:bg-indigo-700">
                                follow
                            </button>
                            <button class="capitalize py-2 px-9 rounded-3xl bg-indigo-100 text-indigo-600 font-semibold text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:bg-indigo-100">message</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <x-title-author>overview</x-title-author>
                <div class="mt-5 border rounded-xl border-gray-200 py-2 px-4">
                    <h3 class="capitalize text-base pt-4 font-semibold text-slate-700">summary</h3>
                    <x-desc-author>
                        Lorem ipsum dolor sit, Lorem ipsum dolor sit, amet consecteturLorem ipsum dolor sit, amet consectetur amet consectetur adipisicing elit.
                        Recusandae quam officiis, odit consectetur dignissimos accusamus ratione quo
                    </x-desc-author>
                </div>
            </div>
            <div class="mt-8">
                <x-title-author>articles</x-title-author>
                <div class="mt-5 border rounded-xl border-gray-200 py-2 px-4">
                    <h3 class="capitalize text-base pt-4 font-semibold text-slate-700">latest articles</h3>
                    <x-desc-author>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus soluta nam laudantium, aliquid ducimus adipisci</x-desc-author>
                    <x-blog-card></x-blog-card>
                    <x-blog-card></x-blog-card>
                </div>
            </div>
        </div>
        <div class="h-fit overflow-hidden w-[32%] ml-6 m-2">
            <div class="w-full py-5 px-5 h-fit border-gray-200 border rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-lg font-bold leading-none text-gray-900 mt-3 capitalize">Latest Customers</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        View all
                    </a>
                </div>
                <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="size-12 flex-none rounded-full bg-gray-50"
                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-gray-900">Leslie Alexander</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <button
                                class="capitalize py-2 px-9 rounded-3xl bg-blue-950 text-white font-semibold text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-100 hover:bg-indigo-700">
                                follow
                            </button>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="size-12 flex-none rounded-full bg-gray-50"
                                src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-gray-900">Michael Foster</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <button
                                class="capitalize py-2 px-9 rounded-3xl bg-blue-950 text-white font-semibold text-lg leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-100 hover:bg-indigo-700">
                                follow
                            </button>
                        </div>
                    </li>
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="size-12 flex-none rounded-full bg-gray-50"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm/6 font-semibold text-gray-900">Tom Cook</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <button class="capitalize py-1 px-4 rounded-xl bg-gray-800 text-white font-normal text-base leading-7 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-100 hover:bg-indigo-700">
                                    follow
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="w-full py-5 px-5 h-fit border-gray-200 border rounded-xl mt-10">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-lg font-bold leading-none text-gray-900 mt-3 capitalize">additional details</h5>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                        Edit
                    </a>
                </div>
                <div class="flex items-center mt-9">
                    <section>
                        <img src="{{ asset('images/add.svg') }}" alt="icon" class="size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium text-sm uppercase text-gray-400">email address</p>
                        <span class="text-cyan-500 font-medium">yousseferremili19@gmail.com</span>
                    </section>
                </div>
                <div class="flex items-center mt-3">
                    <section>
                        <img src="{{ asset('images/add.svg') }}" alt="icon" class="size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium uppercase text-sm text-gray-400">country</p>
                        <span class="text-cyan-500 capitalize font-medium">morocco</span>
                    </section>
                </div>
                <div class="flex items-center mt-3">
                    <section>
                        <img src="{{ asset('images/add.svg') }}" alt="icon" class="size-5">
                    </section>
                    <section class="ml-2">
                        <p class="font-medium uppercase text-sm text-gray-400">join date</p>
                        <span class="text-gray-700 font-medium">2 months and three days</span>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
