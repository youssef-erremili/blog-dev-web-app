<x-dashboard>
    <x-breadcrumb />

    <!-- Hero Section -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
        <!-- Welcome Card -->
        <div class="xl:col-span-2">
            <div
                class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 rounded-2xl p-8 text-white shadow-xl">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/5"></div>
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -translate-y-20 translate-x-20">
                </div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/5 rounded-full translate-y-16 -translate-x-16">
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl sm:text-4xl font-bold mb-3">
                        Welcome back, {{ Auth::user()->name }}! 👋
                    </h2>
                    <p class="text-gray-300 text-sm sm:text-base leading-relaxed mb-6 max-w-2xl">
                        Everything you want to know about your overviews and results is shown here.
                        Track your progress and manage your content effortlessly.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('publish-blog.create') }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-white text-gray-900 text-sm font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 group">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create New Article
                        </a>

                        <a href="#"
                            class="inline-flex items-center justify-center px-6 py-3 border border-white/30 text-white text-sm font-semibold rounded-xl hover:bg-white/10 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            View Analytics
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Followers Card -->
        <div
            class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Community</h3>
                <div class="p-2 bg-gray-100 rounded-lg">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                        </path>
                    </svg>
                </div>
            </div>
            <x-followers :users="$users"></x-followers>
        </div>
    </div>

    <!-- Overview Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm mb-8">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Performance Overview</h2>
                    <p class="text-gray-600 mt-1">Track your content performance and engagement</p>
                </div>
                <div class="hidden sm:flex items-center space-x-2 text-sm text-gray-500">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        Last 30 days
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Stats Grid -->
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Profile Views -->
                        <div
                            class="group bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Profile Views</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ number_format(Auth::user()->views) }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Followers -->
                        <div
                            class="group bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6 border border-green-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Followers</p>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ number_format($users->followers->count()) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Following -->
                        <div
                            class="group bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-purple-600 to-violet-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Following</p>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ number_format($users->following->count()) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Engagement Rate -->
                        <div
                            class="group bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl p-6 border border-orange-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-orange-600 to-amber-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Engagement Rate</p>
                                    <p class="text-2xl font-bold text-gray-900">10.5%</p>
                                </div>
                            </div>
                        </div>

                        <!-- Published Articles -->
                        <div
                            class="group bg-gradient-to-br from-cyan-50 to-blue-50 rounded-xl p-6 border border-cyan-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Published Articles</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ number_format($posts) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Articles -->
                        <div
                            class="group bg-gradient-to-br from-rose-50 to-pink-50 rounded-xl p-6 border border-rose-200 hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div
                                        class="p-3 bg-gradient-to-r from-rose-600 to-pink-600 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Pending Articles</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ number_format($pending) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Following Section -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-xl p-6 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Following</h3>
                            <div class="p-2 bg-white rounded-lg shadow-sm">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                        <x-following :users="$users"></x-following>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Articles Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Top Articles</h2>
                    <p class="text-gray-600 mt-1">Your most popular content this period</p>
                </div>
                <div class="flex items-center space-x-3">
                    <label for="period-select" class="text-sm font-medium text-gray-700">Period:</label>
                    <select id="period-select"
                        class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 cursor-pointer">
                        <option value="month">This Month</option>
                        <option value="quarter">Last 3 Months</option>
                        <option value="year">This Year</option>
                        <option value="all">All Time</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="p-6">
            @forelse ($topArticle as $article)
                <div
                    class="mb-4 last:mb-0 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200 group">
                    <x-top-article :$article :loop="$loop->iteration" />
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No articles yet</h3>
                    <p class="text-gray-600 mb-6">Start creating amazing content to see your top articles here!</p>
                    <a href="{{ route('publish-blog.create') }}"
                        class="inline-flex items-center px-6 py-3 bg-gray-900 text-white text-sm font-semibold rounded-xl hover:bg-gray-800 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Your First Article
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-dashboard>