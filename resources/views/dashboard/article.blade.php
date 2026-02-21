<x-dashboard>
    <x-breadcrumb />
    
    <!-- Header Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Article Overview</h1>
                <p class="text-gray-600 mt-2">Manage your articles and article settings</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <a href="{{ route('publish-blog.create') }}" 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3 bg-gray-900 text-white text-sm font-semibold rounded-xl hover:bg-gray-800 transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 group">
                    <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Article
                </a>
            </div>
        </div>
    </div>

    <!-- Articles Table Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden mb-8" x-data="{ model: false }">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Your Articles</h2>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <span>{{ $posts->total() }} total articles</span>
                </div>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Article</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Content Preview</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Views</th>
                        <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50 transition-colors duration-200" x-data="{ open: false }">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 w-12 h-12">
                                        <img class="w-12 h-12 rounded-lg object-cover border border-gray-200" 
                                             src="{{ $post->cover_url }}" 
                                             alt="{{ $post->title }}">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="text-sm font-semibold text-gray-900 truncate">
                                            {{ Str::limit($post->title, 40, '...') }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">
                                            {{ $post->created_at->format('M j, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 max-w-xs">
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ Str::limit($post->content, 80, '...') }}
                                </p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $post->status == 'draft' ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800' }}">
                                    <div class="w-1.5 h-1.5 {{ $post->status == 'draft' ? 'bg-amber-400' : 'bg-green-400' }} rounded-full mr-2"></div>
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ number_format($post->views) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="relative">
                                    <button type="button" 
                                            @click="open = !open" 
                                            class="inline-flex items-center p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                        </svg>
                                    </button>
                                    
                                    <div x-show="open" 
                                         @click.outside="open = false" 
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="absolute right-0 z-50 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200">
                                        <div class="py-2">
                                            @if ($post->status === 'published')
                                                <x-url-reader :$post class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                    </svg>
                                                    Read Article
                                                </x-url-reader>
                                            @endif
                                            <a href="{{ route('publish-blog.edit', ['post' => $post->id]) }}" 
                                               target="_blank"
                                               class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit Article
                                            </a>
                                            <button type="button" 
                                                    @click="model = !model; open = false"
                                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete Article
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">No articles yet</h3>
                                    <p class="text-gray-500 mb-6">Get started by creating your first article</p>
                                    <a href="{{ route('publish-blog.create') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Create Article
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden divide-y divide-gray-200">
            @forelse ($posts as $post)
                <div class="p-6" x-data="{ open: false }">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <img class="w-16 h-16 rounded-lg object-cover border border-gray-200" 
                                 src="{{ $post->cover_url }}" 
                                 alt="{{ $post->title }}">
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-start justify-between">
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-base font-semibold text-gray-900 truncate">
                                        {{ Str::limit($post->title, 50, '...') }}
                                    </h3>
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                                        {{ Str::limit($post->content, 100, '...') }}
                                    </p>
                                    <div class="flex items-center space-x-4 mt-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $post->status == 'draft' ? 'bg-amber-100 text-amber-800' : 'bg-green-100 text-green-800' }}">
                                            {{ ucfirst($post->status) }}
                                        </span>
                                        <span class="flex items-center text-xs text-gray-500">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            {{ number_format($post->views) }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            {{ $post->created_at->format('M j, Y') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="relative ml-2">
                                    <button type="button" 
                                            @click="open = !open" 
                                            class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                        </svg>
                                    </button>
                                    
                                    <div x-show="open" 
                                         @click.outside="open = false" 
                                         x-transition
                                         class="absolute right-0 z-50 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200">
                                        <div class="py-2">
                                            @if ($post->status === 'published')
                                                <x-url-reader :$post class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                    </svg>
                                                    Read Article
                                                </x-url-reader>
                                            @endif
                                            <a href="{{ route('publish-blog.edit', ['post' => $post->id]) }}" 
                                               target="_blank"
                                               class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit Article
                                            </a>
                                            <button type="button" 
                                                    @click="model = !model; open = false"
                                                    class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete Article
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No articles yet</h3>
                        <p class="text-gray-500 mb-6">Get started by creating your first article</p>
                        <a href="{{ route('publish-blog.create') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Article
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($posts->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                {{ $posts->links() }}
            </div>
        @endif

        <!-- Delete Modal -->
        @isset($post)
            <x-form action="{{ route('publish-blog.delete', ['post' => $post->id]) }}">
                @method('DELETE')
                <x-model></x-model>
            </x-form>
        @endisset
    </div>

    <!-- Saved Articles Section -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Saved Articles</h2>
                    <p class="text-sm text-gray-600 mt-1">Articles you've bookmarked for later reading</p>
                </div>
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                    </svg>
                    <span>{{ $saves->count() }} saved items</span>
                </div>
            </div>
        </div>
        
        <div class="p-6">
            @forelse ($saves as $save)
                <div class="mb-4 last:mb-0 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200">
                    <x-save-article :save="$save" :loop="$loop->iteration" />
                </div>
            @empty
                <div class="text-center py-8">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No saved articles yet</h3>
                    <p class="text-gray-500 mb-6">Start saving articles you want to read later</p>
                    <button class="inline-flex items-center px-4 py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Discover Articles
                    </button>
                </div>
            @endforelse
        </div>
    </div>
</x-dashboard>