<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <!-- Article Container -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Article Header -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <div class="p-8 sm:p-12">
                    <!-- Article Title -->
                    <div class="mb-8">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-4">
                            {{ $post->title }}
                        </h1>
                    </div>

                    <!-- Author Section -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 mb-8">
                        <div class="flex items-center space-x-4">
                            <!-- Author Avatar -->
                            <div class="flex-shrink-0">
                                @if ($post->user->profile_picture === null)
                                    <div
                                        class="w-14 h-14 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center shadow-lg">
                                        <span class="text-lg font-bold text-white uppercase">
                                            {{ Str::limit($post->user->name, 1, '') }}
                                        </span>
                                    </div>
                                @else
                                    <img class="w-14 h-14 rounded-full object-cover border-3 border-white shadow-lg"
                                        src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                        alt="{{ $post->user->name }}">
                                @endif
                            </div>

                            <!-- Author Info -->
                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <a href="{{ route('author', ['id' => $post->user->id, 'author' => Str::slug($post->user->name)]) }}"
                                        class="text-lg font-semibold text-gray-900 hover:text-gray-700 transition-colors duration-200">
                                        {{ $post->user->name }}
                                    </a>

                                    @auth
                                        @if ($post->user->id !== Auth::user()->id)
                                            @if ($preventfollow === false)
                                                <x-form action="{{ route('follow', ['authorId' => $post->user->id]) }}"
                                                    class="inline">
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                        Follow
                                                    </button>
                                                </x-form>
                                            @elseif ($preventfollow === true)
                                                <x-form action="{{ route('unfollow', ['followId' => $alreadyFollowing->id]) }}"
                                                    class="inline">
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Following
                                                    </button>
                                                </x-form>
                                            @endif
                                        @endif
                                    @endauth
                                </div>

                                <div class="flex flex-wrap items-center text-sm text-gray-600 gap-4">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $reading_time }} read
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Bar -->
                    <div class="flex items-center justify-between py-6 border-t border-b border-gray-200">
                        <!-- Left Actions -->
                        <div class="flex items-center space-x-6">
                            <!-- Like Button -->
                            <div class="flex items-center">
                                @if (!$preventlike)
                                    <x-form action="{{ route('like', ['postId' => $post->id]) }}" class="inline">
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200 group">
                                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                            </svg>
                                            <span class="text-sm font-medium">Like</span>
                                        </button>
                                    </x-form>
                                @else
                                    <x-form action="{{ route('dislike', ['dislikeId' => $post->id]) }}" class="inline">
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center space-x-2 px-4 py-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all duration-200 group">
                                            <svg class="w-5 h-5 fill-current group-hover:scale-110 transition-transform duration-200"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                            </svg>
                                            <span class="text-sm font-medium">Liked</span>
                                        </button>
                                    </x-form>
                                @endif
                            </div>

                            <!-- Comment Button -->
                            <a href="#"
                                class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span class="text-sm font-medium">Comment</span>
                            </a>
                        </div>

                        <!-- Right Actions -->
                        <div class="flex items-center space-x-6">
                            <!-- Save Button -->
                            <div class="flex items-center">
                                @if ($alreadySaved)
                                    <x-form action="{{ route('delete-article', ['id' => $alreadySaved->id]) }}"
                                        class="inline">
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center space-x-2 px-4 py-2 text-yellow-600 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition-all duration-200 group">
                                            <svg class="w-5 h-5 fill-current group-hover:scale-110 transition-transform duration-200"
                                                viewBox="0 0 24 24">
                                                <path d="M17 3H7a2 2 0 00-2 2v16l7-3 7 3V5a2 2 0 00-2-2z"></path>
                                            </svg>
                                            <span class="text-sm font-medium">Saved</span>
                                        </button>
                                    </x-form>
                                @else
                                    <x-form action="{{ route('save-article', ['id' => $post->id]) }}" class="inline">
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200 group">
                                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3-7 3V5z"></path>
                                            </svg>
                                            <span class="text-sm font-medium">Save</span>
                                        </button>
                                    </x-form>
                                @endif
                            </div>

                            <!-- Share Button -->
                            <a href="#"
                                class="flex items-center space-x-2 px-4 py-2 text-gray-600 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200 group">
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                    </path>
                                </svg>
                                <span class="text-sm font-medium">Share</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Content -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                <!-- Featured Image -->
                <div class="relative">
                    <img class="w-full h-64 sm:h-80 lg:h-96 object-cover"
                        src="{{ $post->cover_url }}" alt="{{ $post->title }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Article Body -->
                <div class="p-8 sm:p-12">
                    <article class="prose prose-lg max-w-none">
                        <div class="text-gray-800 leading-relaxed text-lg font-normal space-y-6">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </article>
                </div>
            </div>

            <!-- Tags Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Related Topics</h3>
                <div class="flex flex-wrap gap-3">
                    @if($post->tag1)
                        <span
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-full cursor-pointer transition-colors duration-200 group">
                            <span class="mr-2">#</span>
                            <span class="group-hover:text-gray-900">{{ $post->tag1 }}</span>
                        </span>
                    @endif
                    @if($post->tag2)
                        <span
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-full cursor-pointer transition-colors duration-200 group">
                            <span class="mr-2">#</span>
                            <span class="group-hover:text-gray-900">{{ $post->tag2 }}</span>
                        </span>
                    @endif
                    @if($post->tag3)
                        <span
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-full cursor-pointer transition-colors duration-200 group">
                            <span class="mr-2">#</span>
                            <span class="group-hover:text-gray-900">{{ $post->tag3 }}</span>
                        </span>
                    @endif
                    @if($post->tag4)
                        <span
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-full cursor-pointer transition-colors duration-200 group">
                            <span class="mr-2">#</span>
                            <span class="group-hover:text-gray-900">{{ $post->tag4 }}</span>
                        </span>
                    @endif
                    @if($post->tag5)
                        <span
                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-full cursor-pointer transition-colors duration-200 group">
                            <span class="mr-2">#</span>
                            <span class="group-hover:text-gray-900">{{ $post->tag5 }}</span>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Back to Top Button -->
            <div class="fixed bottom-8 right-8">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="w-12 h-12 bg-gray-900 hover:bg-gray-800 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center group">
                    <svg class="w-5 h-5 group-hover:-translate-y-1 transition-transform duration-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>