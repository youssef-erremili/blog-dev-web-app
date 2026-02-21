@props(['article'])

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Section Header -->
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Featured Stories</h2>
        <p class="text-gray-600">Discover our most engaging and popular articles</p>
    </div>

    @if(count($article) > 0)
        <!-- Desktop Grid Layout -->
        <div class="hidden lg:block p-6">
            <div class="grid grid-cols-4 grid-rows-4 gap-4 h-96">
                <!-- Main Featured Article (First Article) -->
                @if(isset($article[0]))
                    <div class="col-span-2 row-span-4 relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <img src="{{ $article[0]->cover_url }}" 
                             class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" 
                             alt="{{ $article[0]->title }}"
                             loading="lazy">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-70 group-hover:opacity-80 transition-opacity duration-300"></div>
                        
                        <!-- Content Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-medium uppercase tracking-wide mb-3">
                                {{ $article[0]->category }}
                            </span>
                            <a href="{{ url('reader', ['id' => $article[0]->id, 'writer' => Str::slug($article[0]->user->name), 'title' => Str::slug($article[0]->title)]) }}" 
                               target="_blank"
                               class="block group-hover:text-gray-200 transition-colors duration-200">
                                <h3 class="text-xl font-bold leading-tight mb-2 line-clamp-3">
                                    {{ $article[0]->title }}
                                </h3>
                            </a>
                            <div class="flex items-center text-sm text-gray-300">
                                <span>{{ $article[0]->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $article[0]->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Secondary Articles -->
                @for($i = 1; $i <= 4; $i++)
                    @if(isset($article[$i]))
                        <div class="row-span-2 relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <img src="{{ $article[$i]->cover_url }}" 
                                 class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                 alt="{{ $article[$i]->title }}"
                                 loading="lazy">
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent opacity-70 group-hover:opacity-80 transition-opacity duration-300"></div>
                            
                            <!-- Content Overlay -->
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <span class="inline-block px-2 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-medium uppercase tracking-wide mb-2">
                                    {{ $article[$i]->category }}
                                </span>
                                <a href="{{ url('reader', ['id' => $article[$i]->id, 'writer' => Str::slug($article[$i]->user->name), 'title' => Str::slug($article[$i]->title)]) }}" 
                                   target="_blank"
                                   class="block group-hover:text-gray-200 transition-colors duration-200">
                                    <h4 class="text-sm font-bold leading-tight line-clamp-2">
                                        {{ Str::limit($article[$i]->title, 50, '...') }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        <!-- Tablet Layout (2 columns) -->
        <div class="hidden md:block lg:hidden p-6">
            <div class="grid grid-cols-2 gap-6">
                @foreach($article->take(4) as $index => $item)
                    <div class="relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 {{ $index === 0 ? 'md:row-span-2' : '' }}">
                        <div class="{{ $index === 0 ? 'h-80' : 'h-48' }}">
                            <img src="{{ $item->cover_url }}" 
                                 class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" 
                                 alt="{{ $item->title }}"
                                 loading="lazy">
                        </div>
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-70 group-hover:opacity-80 transition-opacity duration-300"></div>
                        
                        <!-- Content Overlay -->
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-medium uppercase tracking-wide mb-2">
                                {{ $item->category }}
                            </span>
                            <a href="{{ url('reader', ['id' => $item->id, 'writer' => Str::slug($item->user->name), 'title' => Str::slug($item->title)]) }}" 
                               target="_blank"
                               class="block group-hover:text-gray-200 transition-colors duration-200">
                                <h4 class="{{ $index === 0 ? 'text-lg' : 'text-sm' }} font-bold leading-tight line-clamp-2 mb-2">
                                    {{ $index === 0 ? $item->title : Str::limit($item->title, 60, '...') }}
                                </h4>
                            </a>
                            @if($index === 0)
                                <div class="flex items-center text-sm text-gray-300">
                                    <span>{{ $item->user->name }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Mobile Layout (Single column) -->
        <div class="block md:hidden p-6 space-y-6">
            @foreach($article->take(3) as $index => $item)
                <div class="relative group overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="h-48">
                        <img src="{{ $item->cover_url }}" 
                             class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500" 
                             alt="{{ $item->title }}"
                             loading="lazy">
                    </div>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-70 group-hover:opacity-80 transition-opacity duration-300"></div>
                    
                    <!-- Content Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                        <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-medium uppercase tracking-wide mb-2">
                            {{ $item->category }}
                        </span>
                        <a href="{{ url('reader', ['id' => $item->id, 'writer' => Str::slug($item->user->name), 'title' => Str::slug($item->title)]) }}" 
                           target="_blank"
                           class="block group-hover:text-gray-200 transition-colors duration-200">
                            <h4 class="text-base font-bold leading-tight line-clamp-2 mb-2">
                                {{ $item->title }}
                            </h4>
                        </a>
                        <div class="flex items-center text-sm text-gray-300">
                            <span>{{ $item->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Articles Button -->
        <div class="p-6 pt-0">
            <a href="#" class="inline-flex items-center justify-center w-full px-6 py-3 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-xl transition-all duration-300 hover:shadow-lg transform hover:-translate-y-0.5 group">
                <span>Explore All Articles</span>
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

    @else
        <!-- Empty State -->
        <div class="p-12 text-center">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Featured Articles</h3>
            <p class="text-gray-600 mb-6">There are no articles to display at the moment.</p>
            <a href="#" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white font-semibold rounded-xl hover:bg-gray-800 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create First Article
            </a>
        </div>
    @endif
</div>