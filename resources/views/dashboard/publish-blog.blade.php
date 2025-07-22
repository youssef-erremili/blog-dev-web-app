<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-10">
            <div class="max-w-6xl mx-auto px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <x-title-author class="text-2xl font-bold text-gray-900">
                            Dashboard's {{ Auth::user()->name }}
                        </x-title-author>
                        <p class="text-sm text-gray-600 mt-1">Create and share your thoughts with the world</p>
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
                    <x-form action="{{ route('publish-blog.store') }}" class="space-y-6">
                        @method('POST')
                        
                        <!-- Blog Title -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label for="title" class="block text-sm font-semibold text-gray-900">
                                    Blog Title <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    name="title" 
                                    value="{{ old('title') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-gray-900 placeholder-gray-500"
                                    placeholder="Choose a compelling title that grabs attention..."
                                >
                                <p class="text-xs text-gray-500">A compelling title helps readers find your content</p>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label for="content" class="block text-sm font-semibold text-gray-900">
                                    Blog Content <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <textarea 
                                        id="content" 
                                        name="content" 
                                        rows="12"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-gray-900 placeholder-gray-500 resize-none"
                                        placeholder="Start writing your amazing content here...">{{ old('content') }}</textarea>
                                    <div class="absolute bottom-3 right-3 bg-white px-2 py-1 rounded border text-xs text-gray-500">
                                        Words: <span id="word-count" class="font-medium text-gray-700">0</span>
                                    </div>
                                </div>
                                @error('content')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Blog Settings -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Blog Settings</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Status -->
                                <div class="space-y-2">
                                    <label for="status" class="block text-sm font-medium text-gray-700">
                                        Publication Status <span class="text-red-500">*</span>
                                    </label>
                                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <option value="" disabled selected>Select publication status</option>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>📝 Save as Draft</option>
                                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>🚀 Publish Now</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="space-y-2">
                                    <label for="category" class="block text-sm font-medium text-gray-700">
                                        Blog Category <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                                        <option value="" disabled selected>Choose a category</option>
                                        <option value="technology" {{ old('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                                        <option value="lifestyle" {{ old('category') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                                        <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business</option>
                                        <option value="health" {{ old('category') == 'health' ? 'selected' : '' }}>Health</option>
                                        <option value="travel" {{ old('category') == 'travel' ? 'selected' : '' }}>Travel</option>
                                    </select>
                                    @error('category')
                                        <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-900">Featured Image</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                                    <div class="space-y-2">
                                        <div class="mx-auto w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            <label for="article_cover" class="cursor-pointer text-blue-600 hover:text-blue-700 font-medium">
                                                Click to upload
                                            </label>
                                            or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG or WebP (MAX. 2MB)</p>
                                    </div>
                                    <input id="article_cover" name="article_cover" type="file" class="hidden" accept="image/*" value="{{ old('article_cover') }}">
                                </div>
                                <!-- Preview -->
                                <div class="hidden" id="image-preview">
                                    <div class="relative inline-block">
                                        <img id="preview-img" class="w-32 h-20 object-cover rounded-lg border" src="" alt="Preview">
                                        <button type="button" id="remove-image" class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                            ×
                                        </button>
                                    </div>
                                </div>
                                @error('article_cover')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <div class="space-y-3">
                                <label class="block text-sm font-semibold text-gray-900">
                                    Tags
                                    <span class="text-xs font-normal text-gray-500 ml-2">Help readers discover your content</span>
                                </label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3" id="tag-container">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 1" name="tag1" value="{{ old('tag1') }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 2" name="tag2" value="{{ old('tag2') }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 3" name="tag3" value="{{ old('tag3') }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 4" name="tag4" value="{{ old('tag4') }}">
                                    <input type="text"
                                        class="px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors placeholder-gray-400 bg-white hover:border-gray-400 text-center"
                                        placeholder="Tag 5" name="tag5" value="{{ old('tag5') }}">
                                </div>
                                @error('tag5')
                                    <p class="mt-2 text-sm text-red-600 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                            <button type="submit" name="action" value="draft" class="px-6 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                💾 Save as Draft
                            </button>
                            <div class="flex items-center gap-3">
                                <x-button-primary type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    🚀 Publish Blog Post
                                </x-button-primary>
                            </div>
                        </div>
                    </x-form>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="space-y-6">
                        
                        <!-- Writing Tips -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">
                                <svg class="w-4 h-4 inline-block mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Writing Tips
                            </h3>
                            <div class="text-sm text-gray-600 space-y-2">
                                <p>• Use up to five tags for better discoverability</p>
                                <p>• A compelling title and featured image increase engagement</p>
                                <p>• Save as draft to review later, or publish immediately</p>
                                <p>• Keep your content engaging and well-structured</p>
                            </div>
                        </div>

                        <!-- Blog Statistics -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Blog Statistics</h3>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Author:</span>
                                    <span class="font-medium">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Created:</span>
                                    <span class="font-medium">{{ date('M d, Y') }}</span>
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

                        <!-- SEO Score -->
                        <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                            <h3 class="text-sm font-semibold text-gray-900 mb-4">Content Quality</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Overall Score</span>
                                    <span class="text-sm font-bold text-blue-600" id="quality-score">0/100</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full transition-all duration-300" id="quality-bar" style="width: 0%"></div>
                                </div>
                                <div class="space-y-2 text-xs" id="quality-indicators">
                                    <div class="flex items-center text-gray-400" id="title-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V5z"></path>
                                        </svg>
                                        Title added
                                    </div>
                                    <div class="flex items-center text-gray-400" id="content-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V5z"></path>
                                        </svg>
                                        Content has good length
                                    </div>
                                    <div class="flex items-center text-gray-400" id="category-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V5z"></path>
                                        </svg>
                                        Category selected
                                    </div>
                                    <div class="flex items-center text-gray-400" id="image-check">
                                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V5z"></path>
                                        </svg>
                                        Featured image added
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
        document.getElementById('article_cover').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('preview-img').src = e.target.result;
                    document.getElementById('image-preview').classList.remove('hidden');
                    updateQualityScore();
                };
                reader.readAsDataURL(file);
            }
        });

        // Remove image preview
        document.getElementById('remove-image').addEventListener('click', function () {
            document.getElementById('article_cover').value = '';
            document.getElementById('image-preview').classList.add('hidden');
            updateQualityScore();
        });

        // Update quality score based on form completion
        function updateQualityScore() {
            let score = 0;
            const indicators = {
                title: document.getElementById('title').value.trim().length > 0,
                content: document.getElementById('content').value.trim().split(/\s+/).filter(word => word.length > 0).length >= 100,
                category: document.getElementById('category').value !== '',
                image: document.getElementById('article_cover').files.length > 0 || document.getElementById('image-preview').classList.contains('hidden') === false
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