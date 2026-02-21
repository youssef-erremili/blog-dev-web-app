<x-app-layout>

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-28">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block px-4 py-1.5 text-xs font-semibold tracking-widest text-blue-300 uppercase border border-blue-800 bg-blue-900/30 rounded-full mb-8">Our Vision</span>
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white leading-tight mb-6">
                Writing That <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Moves the World</span>
            </h1>
            <p class="text-xl text-gray-400 leading-relaxed max-w-2xl mx-auto">
                We believe every person has a story worth sharing. DevBlog is a platform built for curious minds — readers and writers united by a love of ideas.
            </p>
        </div>
    </section>

    {{-- Mission Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-widest text-blue-600 mb-4 block">Our Mission</span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">Make knowledge accessible to everyone.</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        We started DevBlog because we saw a gap: brilliant developers, designers, and thinkers had no single place to share their work in a clean, distraction-free environment.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Our mission is simple — eliminate that gap. Give every writer a stage and every reader a feed they actually want to open each morning.
                    </p>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl transform rotate-3"></div>
                    <img src="https://picsum.photos/seed/vision-mission/700/480"
                         alt="Mission" class="relative rounded-3xl shadow-lg w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">What We Stand For</h2>
                <p class="text-gray-500 max-w-xl mx-auto">The principles that guide every decision we make.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $values = [
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                        'title' => 'Quality Writing',
                        'text' => 'We champion long-form, thoughtful content over clickbait. Every article on DevBlog is written by a real human with something genuine to say.',
                        'color' => 'blue',
                    ],
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                        'title' => 'Community First',
                        'text' => 'Writers support writers here. We foster a culture of constructive feedback, genuine engagement, and mutual growth.',
                        'color' => 'green',
                    ],
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5a2 2 0 002 2h2a2 2 0 002-2v-1.065M15 3.935V5a2 2 0 002 2h2a2 2 0 002-2v-1.065M12 4a8 8 0 100 16 8 8 0 000-16z"/>',
                        'title' => 'Open Access',
                        'text' => 'Great ideas should not be locked behind paywalls. We believe knowledge is more powerful when it is shared freely.',
                        'color' => 'purple',
                    ],
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                        'title' => 'Integrity',
                        'text' => 'We do not sell your data or compromise our editorial standards for ad revenue. What you read is honest — always.',
                        'color' => 'amber',
                    ],
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                        'title' => 'Constant Innovation',
                        'text' => 'We ship improvements constantly. If there is a better experience to be built for our writers and readers, we will build it.',
                        'color' => 'cyan',
                    ],
                    [
                        'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                        'title' => 'Passion-Driven',
                        'text' => 'We are readers and writers ourselves. Every feature we build starts with the question: would we want this?',
                        'color' => 'rose',
                    ],
                ];
                $colorMap = [
                    'blue'   => ['bg' => 'bg-blue-50', 'icon' => 'text-blue-600', 'border' => 'border-blue-100'],
                    'green'  => ['bg' => 'bg-green-50', 'icon' => 'text-green-600', 'border' => 'border-green-100'],
                    'purple' => ['bg' => 'bg-purple-50', 'icon' => 'text-purple-600', 'border' => 'border-purple-100'],
                    'amber'  => ['bg' => 'bg-amber-50', 'icon' => 'text-amber-600', 'border' => 'border-amber-100'],
                    'cyan'   => ['bg' => 'bg-cyan-50', 'icon' => 'text-cyan-600', 'border' => 'border-cyan-100'],
                    'rose'   => ['bg' => 'bg-rose-50', 'icon' => 'text-rose-600', 'border' => 'border-rose-100'],
                ];
                @endphp

                @foreach($values as $value)
                    @php $c = $colorMap[$value['color']]; @endphp
                    <div class="bg-white rounded-2xl p-8 border {{ $c['border'] }} hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <div class="w-12 h-12 {{ $c['bg'] }} rounded-xl flex items-center justify-center mb-5">
                            <svg class="w-6 h-6 {{ $c['icon'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $value['icon'] !!}
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $value['title'] }}</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $value['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-5">Ready to share your story?</h2>
            <p class="text-gray-500 text-lg mb-10">Join hundreds of writers who publish on DevBlog every day.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @auth
                    <a href="{{ route('publish-blog.create') }}"
                       class="px-8 py-4 bg-gray-900 text-white font-semibold rounded-2xl hover:bg-gray-800 transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
                        Start Writing Today
                    </a>
                @else
                    <a href="{{ route('sign-up') }}"
                       class="px-8 py-4 bg-gray-900 text-white font-semibold rounded-2xl hover:bg-gray-800 transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
                        Create a Free Account
                    </a>
                    <a href="{{ route('explore') }}"
                       class="px-8 py-4 border border-gray-300 text-gray-700 font-semibold rounded-2xl hover:border-gray-900 hover:text-gray-900 transition-all duration-300">
                        Explore Articles
                    </a>
                @endauth
            </div>
        </div>
    </section>

</x-app-layout>
