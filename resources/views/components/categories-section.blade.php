@props(['categories'])

@php
    // Map categories to icons and gradient colors for visual distinction
    $categoryMeta = [
        'coding' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>', 'gradient' => 'from-blue-50 to-indigo-50', 'text' => 'text-blue-700', 'border' => 'border-blue-100'],
        'design' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>', 'gradient' => 'from-pink-50 to-rose-50', 'text' => 'text-pink-700', 'border' => 'border-pink-100'],
        'software' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>', 'gradient' => 'from-purple-50 to-violet-50', 'text' => 'text-purple-700', 'border' => 'border-purple-100'],
        'lifestyle' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>', 'gradient' => 'from-red-50 to-orange-50', 'text' => 'text-red-700', 'border' => 'border-red-100'],
        'motivation' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>', 'gradient' => 'from-amber-50 to-yellow-50', 'text' => 'text-amber-700', 'border' => 'border-amber-100'],
        'technology' => ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>', 'gradient' => 'from-cyan-50 to-teal-50', 'text' => 'text-cyan-700', 'border' => 'border-cyan-100'],
    ];

    $defaultMeta = ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"></path>', 'gradient' => 'from-gray-50 to-slate-50', 'text' => 'text-gray-700', 'border' => 'border-gray-200'];
@endphp

<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Explore Topics</h2>
            <p class="text-gray-600 max-w-xl mx-auto">Discover articles across a variety of topics — find what inspires you</p>
        </div>

        @if(count($categories) > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                @foreach($categories as $category)
                    @php
                        $meta = $categoryMeta[strtolower($category->category)] ?? $defaultMeta;
                    @endphp
                    <a href="{{ route('explore', ['category' => $category->category]) }}"
                       class="group bg-gradient-to-br {{ $meta['gradient'] }} border {{ $meta['border'] }} rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <!-- Icon -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-white shadow-sm flex items-center justify-center group-hover:shadow-md transition-shadow duration-300">
                            <svg class="w-6 h-6 {{ $meta['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $meta['icon'] !!}
                            </svg>
                        </div>

                        <!-- Name -->
                        <h3 class="text-sm font-semibold text-gray-900 capitalize mb-1">{{ $category->category }}</h3>
                        
                        <!-- Count -->
                        <p class="text-xs text-gray-500">
                            {{ $category->posts_count }} {{ Str::plural('article', $category->posts_count) }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No categories yet.</p>
        @endif
    </div>
</section>
