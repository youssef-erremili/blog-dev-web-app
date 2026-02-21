@props(['authors'])

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-10 gap-4">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Top Writers</h2>
                <p class="text-gray-600">Meet the voices shaping our community</p>
            </div>
        </div>

        @if(count($authors) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($authors as $author)
                    <a href="{{ route('author', ['id' => $author->id, 'author' => Str::slug($author->name)]) }}"
                       class="group bg-white rounded-2xl border border-gray-100 p-6 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-1 block">
                        <!-- Avatar -->
                        <div class="relative mx-auto mb-5 w-20 h-20">
                            @if($author->profile_picture)
                                <img class="w-20 h-20 rounded-full object-cover border-3 border-gray-200 shadow-sm group-hover:shadow-md transition-shadow duration-300"
                                    src="{{ asset('storage/' . $author->profile_picture) }}"
                                    alt="{{ $author->name }}">
                            @else
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow duration-300">
                                    <span class="text-2xl font-bold text-white uppercase">
                                        {{ Str::limit($author->name, 1, '') }}
                                    </span>
                                </div>
                            @endif
                            <!-- Online indicator -->
                            <div class="absolute bottom-0 right-0 w-5 h-5 bg-green-400 border-3 border-white rounded-full"></div>
                        </div>

                        <!-- Name -->
                        <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-gray-700 transition-colors duration-200">
                            {{ $author->name }}
                        </h3>

                        <!-- Bio -->
                        @if($author->bio)
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2 leading-relaxed">
                                {{ Str::limit($author->bio, 80, '...') }}
                            </p>
                        @else
                            <p class="text-sm text-gray-400 mb-4 italic">Writer & Creator</p>
                        @endif

                        <!-- Stats -->
                        <div class="flex items-center justify-center gap-4 pt-4 border-t border-gray-100">
                            <div class="text-center">
                                <span class="block text-lg font-bold text-gray-900">{{ $author->posts_count }}</span>
                                <span class="block text-xs text-gray-500">Articles</span>
                            </div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div class="text-center">
                                <span class="block text-lg font-bold text-gray-900">{{ $author->followers_count }}</span>
                                <span class="block text-xs text-gray-500">Followers</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No authors to display yet.</p>
        @endif
    </div>
</section>
