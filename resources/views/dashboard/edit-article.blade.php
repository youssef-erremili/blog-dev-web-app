<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-6xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Edit Article</h1>
                        <p class="text-sm text-gray-600 mt-1">Update your blog post content</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back to Dashboard
                        </button>
                        <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-6 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <x-form action="{{ route('publish-blog.update', ['post' => $post->id]) }}" class="space-y-6">
                        @method('PUT')
                        
                        <!-- Article Title -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label for="title" class="block text-sm font-semibold text-gray-900">
                                    Article Title <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    name="title" 
                                    value="{{ $post->title }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-gray-900 placeholder-gray-500"
                                    placeholder="Choose a compelling title that grabs attention..."
                                >
                                <p class="text-xs text-gray-500">A compelling title helps readers find your content</p>
                            </div>
                        </div>

                        <!-- Article Content -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label for="content" class="block text-sm font-semibold text-gray-900">
                                    Article Content <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <textarea 
                                        id="content" 
                                        name="content" 
                                        rows="12"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-gray-900 placeholder-gray-500 resize-none"
                                        placeholder="Bring all your ideas to this blog...">{{ $post->content }}</textarea>
                                    <div class="absolute bottom-3 right-3 bg-white px-2 py-1 rounded border text-xs text-gray-500">
                                        Words: <span id="word-count" class="font-medium text-gray-700">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Article Settings -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Article Settings</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Status -->
                                <div class="space-y-2">
                                    <label for="status" class="block text-sm font-medium text-gray-700">Blog Status</label>
                                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <option value="" disabled>Select status</option>
                                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>🚀 Published</option>
                                    </select>
                                </div>

                                <!-- Category -->
                                <div class="space-y-2">
                                    <label for="category" class="block text-sm font-medium text-gray-700">Select Category</label>
                                    <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <option value="{{ $post->category }}" selected>{{ ucfirst($post->category) }}</option>
                                        <option value="technology">Technology</option>
                                        <option value="lifestyle">Lifestyle</option>
                                        <option value="business">Business</option>
                                        <option value="health">Health</option>
                                        <option value="travel">Travel</option>
                                        <option value="education">Education</option>
                                        <option value="entertainment">Entertainment</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Article Cover -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-4">
                                <label class="block text-sm font-semibold text-gray-900">Article Cover</label>
                                
                                <!-- Current Image Display -->
                                <div class="flex items-start gap-4">
                                    <div class="relative">
                                        <img 
                                            id="imagePreview" 
                                            src="{{ $post->cover_url }}" 
                                            alt="Article cover"
                                            class="w-48 h-32 object-cover rounded-lg border-2 border-gray-200 shadow-sm"
                                        >
                                        <div class="absolute top-2 right-2">
                                            <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">Current</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Upload Controls -->
                                    <div class="flex-1 space-y-3">
                                        <div class="relative">
                                            <label for="profile_picture" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg cursor-pointer hover:bg-blue-700 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                Upload New Photo
                                            </label>
                                            <input 
                                                type="file" 
                                                id="profile_picture" 
                                                name="article_cover" 
                                                class="hidden" 
                                                accept="image/*"
                                            >
                                        </div>
                                        
                                        <button 
                                            type="button" 
                                            id="delete-image" 
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-red-100 text-red-700 text-sm font-medium rounded-lg hover:bg-red-200 transition-colors"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Remove Image
                                        </button>
                                        
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, JPEG or WebP (MAX. 2MB)<br>
                                            Recommended: 1200x630px for best display
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-4">
                                <label class="block text-sm font-semibold text-gray-900">
                                    Article Tags
                                    <span class="text-xs font-normal text-gray-500 ml-2">Help readers discover your content</span>
                                </label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3" id="tag-container">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 1" name="tag1" value="{{ $post->tag1 }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 2" name="tag2" value="{{ $post->tag2 }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 3" name="tag3" value="{{ $post->tag3 }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 4" name="tag4" value="{{ $post->tag4 }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 5" name="tag5" value="{{ $post->tag5 }}">
                                </div>
                                
                                <!-- Info Alert -->
                                <div class="bg-blue-50/50 border border-blue-200/50 rounded-xl p-4">
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-blue-800">Tag Tips</h4>
                                            <p class="text-sm text-blue-700 mt-1">Each article can have up to five tags. Use relevant keywords to help readers discover your content!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <button type="button" class="px-6 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel Changes
                            </button>
                            <div class="flex items-center gap-3">
                                <x-button-primary class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update Article
                                </x-button-primary>
                            </div>
                        </div>
                    </x-form>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        
                        <!-- Article Info -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Article Information</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium {{ $post->status == 'published' ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Author:</span>
                                    <span class="font-medium">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Created:</span>
                                    <span class="font-medium">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Updated:</span>
                                    <span class="font-medium">{{ $post->updated_at->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Word count:</span>
                                    <span class="font-medium"><span id="sidebar-word-count">0</span> words</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Read time:</span>
                                    <span class="font-medium"><span id="read-time">0</span> min read</span>
                                </div>
                            </div>
                        </div>

                        <!-- Content Quality -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Content Quality</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Overall Score</span>
                                    <span class="text-sm font-bold text-green-600" id="quality-score">100/100</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full transition-all duration-300" id="quality-bar" style="width: 100%"></div>
                                </div>
                                <div class="space-y-2 text-xs" id="quality-indicators">
                                    <div class="flex items-center text-green-600" id="title-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Title is present
                                    </div>
                                    <div class="flex items-center text-green-600" id="content-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Content has good length
                                    </div>
                                    <div class="flex items-center text-green-600" id="category-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Category assigned
                                    </div>
                                    <div class="flex items-center text-green-600" id="image-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Featured image added
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Version History (Optional) -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Recent Changes</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex items-start gap-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-gray-900 font-medium">Content updated</p>
                                        <p class="text-gray-500 text-xs">{{ $post->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-gray-900 font-medium">Article created</p>
                                        <p class="text-gray-500 text-xs">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Word counter for textarea
        function updateWordCount() {
            const content = document.getElementById('content').value;
            const wordCount = content.trim().split(/\s+/).filter(word => word.length > 0).length;
            document.getElementById('word-count').textContent = wordCount;
            document.getElementById('sidebar-word-count').textContent = wordCount;
            
            // Calculate read time (average 200 words per minute)
            const readTime = Math.ceil(wordCount / 200);
            document.getElementById('read-time').textContent = readTime;
            
            updateQualityScore();
        }

        // File upload preview
        document.getElementById('profile_picture').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    updateQualityScore();
                };
                reader.readAsDataURL(file);
            }
        });

        // Delete image functionality
        document.getElementById('delete-image').addEventListener('click', function () {
            // In a real application, you might want to show a confirmation dialog
            if (confirm('Are you sure you want to remove the current image?')) {
                document.getElementById('profile_picture').value = '';
                // You might want to show a placeholder or hide the image
                // For now, we'll just update the quality score
                updateQualityScore();
            }
        });

        // Update quality score based on form completion
        function updateQualityScore() {
            let score = 0;
            const indicators = {
                title: document.getElementById('title').value.trim().length > 0,
                content: document.getElementById('content').value.trim().split(/\s+/).filter(word => word.length > 0).length >= 100,
                category: document.getElementById('category').value !== '',
                image: document.getElementById('imagePreview').src !== ''
            };

            // Update indicators
            Object.keys(indicators).forEach(key => {
                const element = document.getElementById(key + '-check');
                const icon = element.querySelector('svg');
                if (indicators[key]) {
                    score += 25;
                    element.className = 'flex items-center text-green-600';
                    icon.innerHTML = '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>';
                } else {
                    element.className = 'flex items-center text-gray-400';
                    icon.innerHTML = '<path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V5z"></path>';
                }
            });

            // Update score display
            document.getElementById('quality-score').textContent = score + '/100';
            document.getElementById('quality-bar').style.width = score + '%';
            
            // Change color based on score
            const bar = document.getElementById('quality-bar');
            if (score >= 75) {
                bar.className = 'bg-green-500 h-2 rounded-full transition-all duration-300';
                document.getElementById('quality-score').className = 'text-sm font-bold text-green-600';
            } else if (score >= 50) {
                bar.className = 'bg-yellow-500 h-2 rounded-full transition-all duration-300';
                document.getElementById('quality-score').className = 'text-sm font-bold text-yellow-600';
            } else {
                bar.className = 'bg-red-500 h-2 rounded-full transition-all duration-300';
                document.getElementById('quality-score').className = 'text-sm font-bold text-red-600';
            }
        }

        // Add event listeners
        document.getElementById('content').addEventListener('input', updateWordCount);
        document.getElementById('title').addEventListener('input', updateQualityScore);
        document.getElementById('category').addEventListener('change', updateQualityScore);

        // Initialize
        updateWordCount();
        updateQualityScore();
    </script>
</x-app-layout>