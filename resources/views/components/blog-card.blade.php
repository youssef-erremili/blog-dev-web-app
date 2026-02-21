@props(['post', 'reading'])

<article
    class="group bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300 hover:border-gray-300">
    <div class="flex flex-col sm:flex-row">
        <!-- Image Section -->
        <div class="sm:w-80 h-48 sm:h-auto overflow-hidden bg-gray-100 flex-shrink-0">
            <img src="{{ $post->cover_url }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                alt="{{ $post->title }}" />
        </div>

        <!-- Content Section -->
        <div class="flex-1 p-6 flex flex-col justify-between">
            <div class="space-y-4">
                <!-- Meta Information -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                            {{ $post->category }}
                        </span>
                        <div class="flex items-center text-xs text-gray-500 gap-4">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $reading }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                {{ $post->views }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Title -->
                @php
                    $title = Str::length($post->title) < 80 ? $post->title : Str::limit($post->title, 80, '...');
                @endphp
                <h3
                    class="text-lg font-semibold text-gray-900 line-clamp-2 group-hover:text-gray-700 transition-colors">
                    {{ $title }}
                </h3>

                <!-- Description -->
                <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">
                    {{ Str::limit(strip_tags($post->content), 160, '...') }}
                </p>
            </div>

            <!-- Read More Button -->
            <div class="mt-6">
                <x-url-reader :$post
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-slate-800 rounded-lg hover:bg-slate-700 transition-colors duration-200 group/link">
                    <span>Read article</span>
                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-0.5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </x-url-reader>
            </div>
        </div>
    </div>
</article>