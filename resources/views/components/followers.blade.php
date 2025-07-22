@props(['users'])

<div class="space-y-4">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Followers</h3>
            <p class="text-sm text-gray-500">{{ $users->followers->count() }} people</p>
        </div>
        <button type="button" 
                class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors duration-200 flex items-center group">
            View all
            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Followers List -->
    <div class="space-y-3 max-h-80 overflow-y-auto">
        @forelse ($users->followers as $follow)
            <div class="flex items-center justify-between p-3 bg-white rounded-xl border border-gray-100 hover:border-gray-200 hover:shadow-sm transition-all duration-200 group">
                <!-- User Info -->
                <div class="flex items-center space-x-3 min-w-0 flex-1">
                    <!-- Avatar -->
                    <div class="flex-shrink-0 relative">
                        @if ($follow->follower->profile_picture === null)
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center shadow-sm">
                                <span class="text-sm font-medium text-white uppercase">
                                    {{ Str::limit($follow->follower->name, 1, '') }}
                                </span>
                            </div>
                        @else
                            <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                 src="{{ asset('storage/' . $follow->follower->profile_picture) }}" 
                                 alt="{{ $follow->follower->name }}">
                        @endif
                        
                        <!-- Online indicator -->
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    
                    <!-- User Details -->
                    <div class="min-w-0 flex-1">
                        <a href="{{ route('author', ['id' => $follow->follower->id, 'author' => Str::slug($follow->follower->name)]) }}" 
                           class="block group-hover:text-gray-700 transition-colors duration-200">
                            <h4 class="text-sm font-semibold text-gray-900 truncate">
                                {{ $follow->follower->name }}
                            </h4>
                            <p class="text-xs text-gray-500 truncate">
                                @{{ Str::slug($follow->follower->name) }}
                            </p>
                        </a>
                    </div>
                </div>

                <!-- Follower Badge -->
                <div class="flex-shrink-0 ml-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200 group-hover:bg-blue-100 transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Follower
                    </span>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-900 mb-1">No followers yet</h4>
                <p class="text-xs text-gray-500 mb-4">Share amazing content to grow your audience</p>
                <div class="flex flex-col sm:flex-row gap-2 justify-center">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-xs font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Content
                    </button>
                    <button class="inline-flex items-center px-4 py-2 bg-white text-gray-700 text-xs font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                        </svg>
                        Share Profile
                    </button>
                </div>
            </div>
        @endforelse
    </div>
</div>