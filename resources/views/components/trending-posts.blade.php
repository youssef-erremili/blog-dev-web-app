@props(['posts', 'readingTimes'])

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex items-center gap-3 mb-10">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-900">Trending on Dev</h2>
            </div>
        </div>

        @if(count($posts) > 0)
            <!-- Trending Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $index => $post)
                    <article class="group flex gap-5 items-start">
                        <!-- Number -->
                        <span class="text-3xl font-bold text-gray-200 group-hover:text-gray-400 transition-colors duration-300 leading-none mt-1 select-none">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <!-- Content -->
                        <div class="flex-1 min-w-0 space-y-2">
                            <!-- Author Info -->
                            <div class="flex items-center gap-2">
                                <a href="{{ route('author', ['id' => $post->user->id, 'author' => Str::slug($post->user->name)]) }}" 
                                   class="flex items-center gap-2 group/author">
                                    @if($post->user->profile_picture)
                                        <img class="w-6 h-6 rounded-full object-cover border border-gray-200"
                                            src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                            alt="{{ $post->user->name }}">
                                    @else
                                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center">
                                            <span class="text-[10px] font-semibold text-white uppercase">
                                                {{ Str::limit($post->user->name, 1, '') }}
                                            </span>
                                        </div>
                                    @endif
                                    <span class="text-sm font-medium text-gray-700 group-hover/author:text-gray-900 transition-colors duration-200">
                                        {{ $post->user->name }}
                                    </span>
                                </a>
                            </div>

                            <!-- Title -->
                            <x-url-reader :$post class="block">
                                <h3 class="text-base font-bold text-gray-900 leading-snug line-clamp-2 group-hover:text-gray-600 transition-colors duration-200">
                                    {{ $post->title }}
                                </h3>
                            </x-url-reader>

                            <!-- Meta -->
                            <div class="flex items-center gap-3 text-xs text-gray-500">
                                <span>{{ $post->created_at->format('M j, Y') }}</span>
                                <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                                <span>{{ $readingTimes[$index] ?? '3 min read' }}</span>
                                <span class="w-1 h-1 rounded-full bg-gray-400"></span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                    {{ $post->category }}
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No trending posts yet. Check back soon!</p>
        @endif
    </div>
</section>
