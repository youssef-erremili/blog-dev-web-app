@props(['users'])

<div class="space-y-4">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-900">Following</h3>
            <p class="text-sm text-gray-500">{{ $users->following->count() }} people</p>
        </div>
        <button type="button" 
                class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors duration-200 flex items-center group">
            View all
            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Following List -->
    <div class="space-y-3 max-h-80 overflow-y-auto">
        @forelse ($users->following as $follow)
            <div class="flex items-center justify-between p-3 bg-white rounded-xl border border-gray-100 hover:border-gray-200 hover:shadow-sm transition-all duration-200 group">
                <!-- User Info -->
                <div class="flex items-center space-x-3 min-w-0 flex-1">
                    <!-- Avatar -->
                    <div class="flex-shrink-0">
                        @if ($follow->author->profile_picture === null)
                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center shadow-sm">
                                <span class="text-sm font-medium text-white uppercase">
                                    {{ Str::limit($follow->author->name, 1, '') }}
                                </span>
                            </div>
                        @else
                            <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" 
                                 src="{{ asset('storage/' . $follow->author->profile_picture) }}" 
                                 alt="{{ $follow->author->name }}">
                        @endif
                    </div>
                    
                    <!-- User Details -->
                    <div class="min-w-0 flex-1">
                        <a href="{{ route('author', ['id' => $follow->author->id, 'author' => Str::slug($follow->author->name)]) }}" 
                           target="_blank"
                           class="block">
                            <h4 class="text-sm font-semibold text-gray-900 truncate hover:text-gray-700 transition-colors duration-200">
                                {{ $follow->author->name }}
                            </h4>
                            <p class="text-xs text-gray-500 truncate">
                                @{{ Str::slug($follow->author->name) }}
                            </p>
                        </a>
                    </div>
                </div>

                <!-- Following Badge -->
                <div class="flex-shrink-0 ml-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200 group-hover:bg-gray-200 transition-colors duration-200">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Following
                    </span>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                </div>
                <h4 class="text-sm font-medium text-gray-900 mb-1">No one followed yet</h4>
                <p class="text-xs text-gray-500 mb-4">Start connecting with amazing creators</p>
                <button class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-xs font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Discover People
                </button>
            </div>
        @endforelse
    </div>
</div>