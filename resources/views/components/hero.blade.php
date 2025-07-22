<div class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-50 py-16 sm:py-20 lg:py-28">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-gray-100/50 bg-top"></div>

    <!-- Floating Decorative Elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-blue-100 rounded-full opacity-60 blur-xl animate-pulse"></div>
    <div
        class="absolute bottom-20 right-20 w-32 h-32 bg-purple-100 rounded-full opacity-40 blur-2xl animate-pulse delay-1000">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

            <!-- Left Image Gallery -->
            <div class="hidden lg:block lg:col-span-3">
                <div class="space-y-6">
                    <!-- Top Row -->
                    <div class="flex items-end space-x-4 transform -translate-x-6">
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/balon.jpg') }}"
                                class="w-20 h-20 xl:w-24 xl:h-24 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Balloon image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/life-style.jpg') }}"
                                class="w-16 h-16 xl:w-20 xl:h-20 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Lifestyle image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/style.jpg') }}"
                                class="w-12 h-12 xl:w-16 xl:h-16 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Style image">
                        </div>
                    </div>

                    <!-- Bottom Row -->
                    <div class="flex items-start space-x-4 transform -translate-x-8">
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/tech.jpg') }}"
                                class="w-20 h-20 xl:w-24 xl:h-24 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Tech image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/web-design.jpg') }}"
                                class="w-16 h-16 xl:w-20 xl:h-20 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Web design image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/website.jpg') }}"
                                class="w-12 h-12 xl:w-16 xl:h-16 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Website image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Content -->
            <div class="lg:col-span-6 text-center space-y-8">
                <!-- Hero Title -->
                <div class="space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                        <span class="inline-flex items-center">
                            Inside
                            <img src="{{ asset('images/logo.png') }}"
                                class="mx-3 h-12 sm:h-14 lg:h-16 inline-block transform hover:scale-110 transition-transform duration-300"
                                alt="Logo" />
                        </span>
                        <br>
                        <span
                            class="bg-gradient-to-r from-gray-800 via-gray-900 to-gray-800 bg-clip-text text-transparent">
                            Real Stories, Inspiring Voices
                        </span>
                    </h1>

                    <p class="text-lg sm:text-xl text-gray-600 leading-relaxed max-w-2xl mx-auto">
                        A platform where stories and interviews reveal authentic experiences and valuable insights
                    </p>
                </div>

                <!-- Search Section -->
                <div class="space-y-8">
                    <x-form action="{{ route('search') }}" method="get" class="max-w-2xl mx-auto">
                        <div class="relative group">
                            <!-- Search Icon -->
                            <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-600 transition-colors duration-200"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8" />
                                    <path d="m21 21-4.3-4.3" />
                                </svg>
                            </div>

                            <!-- Search Input -->
                            <input type="search" name="search"
                                class="w-full pl-14 pr-32 py-4 sm:py-5 bg-white border-2 border-gray-200 rounded-full text-base sm:text-lg focus:outline-none focus:border-gray-900 focus:ring-4 focus:ring-gray-900 focus:ring-opacity-10 transition-all duration-300 shadow-lg hover:shadow-xl placeholder:text-gray-400"
                                placeholder="Search articles, stories, and insights...">

                            <!-- Search Button -->
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <x-button-primary
                                    class="px-6 py-3 sm:px-8 sm:py-4 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-full transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                                    Search
                                </x-button-primary>
                            </div>
                        </div>
                    </x-form>

                    <!-- Category Tags -->
                    <div class="space-y-4">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Popular Categories</p>
                        <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4">
                            <x-category href="/dd"
                                class="px-4 py-2 sm:px-6 sm:py-3 bg-white border-2 border-gray-200 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-medium rounded-full transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 text-sm sm:text-base">
                                Coding
                            </x-category>
                            <x-category href="/dd"
                                class="px-4 py-2 sm:px-6 sm:py-3 bg-white border-2 border-gray-200 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-medium rounded-full transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 text-sm sm:text-base">
                                Design
                            </x-category>
                            <x-category href="/dd"
                                class="px-4 py-2 sm:px-6 sm:py-3 bg-white border-2 border-gray-200 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-medium rounded-full transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 text-sm sm:text-base">
                                Software
                            </x-category>
                            <x-category href="/dd"
                                class="px-4 py-2 sm:px-6 sm:py-3 bg-white border-2 border-gray-200 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-medium rounded-full transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 text-sm sm:text-base">
                                Lifestyle
                            </x-category>
                            <x-category href="/dd"
                                class="px-4 py-2 sm:px-6 sm:py-3 bg-white border-2 border-gray-200 hover:border-gray-900 text-gray-700 hover:text-gray-900 font-medium rounded-full transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1 text-sm sm:text-base">
                                Motivation
                            </x-category>
                        </div>
                    </div>
                </div>

                <!-- Stats or Features (Optional Enhancement) -->
                <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-200 max-w-md mx-auto">
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl font-bold text-gray-900">1K+</div>
                        <div class="text-sm text-gray-600">Stories</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl font-bold text-gray-900">500+</div>
                        <div class="text-sm text-gray-600">Authors</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl font-bold text-gray-900">10K+</div>
                        <div class="text-sm text-gray-600">Readers</div>
                    </div>
                </div>
            </div>

            <!-- Right Image Gallery -->
            <div class="hidden lg:block lg:col-span-3">
                <div class="space-y-6">
                    <!-- Top Row -->
                    <div class="flex items-end justify-end space-x-4 transform translate-x-8">
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/developement.jpg') }}"
                                class="w-12 h-12 xl:w-16 xl:h-16 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Development image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/flower.jpg') }}"
                                class="w-16 h-16 xl:w-20 xl:h-20 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Flower image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/keyboared.jpg') }}"
                                class="w-20 h-20 xl:w-24 xl:h-24 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Keyboard image">
                        </div>
                    </div>

                    <!-- Bottom Row -->
                    <div class="flex items-start justify-end space-x-4 transform translate-x-6">
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/laptop.jpg') }}"
                                class="w-12 h-12 xl:w-16 xl:h-16 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Laptop image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/mountain.jpg') }}"
                                class="w-16 h-16 xl:w-20 xl:h-20 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Mountain image">
                        </div>
                        <div class="group cursor-pointer">
                            <img src="{{ asset('images/header/nature.jpg') }}"
                                class="w-20 h-20 xl:w-24 xl:h-24 rounded-2xl object-cover shadow-lg group-hover:shadow-xl group-hover:scale-105 transition-all duration-300"
                                alt="Nature image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Image Gallery -->
        <div class="lg:hidden mt-12">
            <div class="grid grid-cols-6 gap-2 sm:gap-3 max-w-md mx-auto opacity-60">
                <img src="{{ asset('images/header/balon.jpg') }}" class="w-full aspect-square rounded-lg object-cover"
                    alt="Balloon">
                <img src="{{ asset('images/header/tech.jpg') }}" class="w-full aspect-square rounded-lg object-cover"
                    alt="Tech">
                <img src="{{ asset('images/header/flower.jpg') }}" class="w-full aspect-square rounded-lg object-cover"
                    alt="Flower">
                <img src="{{ asset('images/header/laptop.jpg') }}" class="w-full aspect-square rounded-lg object-cover"
                    alt="Laptop">
                <img src="{{ asset('images/header/nature.jpg') }}" class="w-full aspect-square rounded-lg object-cover"
                    alt="Nature">
                <img src="{{ asset('images/header/keyboared.jpg') }}"
                    class="w-full aspect-square rounded-lg object-cover" alt="Keyboard">
            </div>
        </div>
    </div>
</div>