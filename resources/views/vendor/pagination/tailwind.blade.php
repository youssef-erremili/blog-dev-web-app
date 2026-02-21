@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col items-center gap-4">

        {{-- Mobile: Previous / Next only --}}
        <div class="flex items-center gap-3 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed select-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 shadow-sm hover:shadow">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Prev
                </a>
            @endif

            <span class="text-sm text-gray-500">
                Page <span class="font-semibold text-gray-900">{{ $paginator->currentPage() }}</span> of <span class="font-semibold text-gray-900">{{ $paginator->lastPage() }}</span>
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 shadow-sm hover:shadow">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed select-none">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>

        {{-- Desktop: Full pagination --}}
        <div class="hidden sm:flex items-center gap-1.5">
            {{-- Previous Button --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed select-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-900 hover:text-gray-900 transition-all duration-200 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Previous
                </a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    {{-- Ellipsis --}}
                    <span class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-gray-500 select-none">
                        &hellip;
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Current Page --}}
                            <span aria-current="page" class="inline-flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-gray-900 border border-gray-900 rounded-xl shadow-sm select-none">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center justify-center w-10 h-10 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-900 hover:text-white hover:border-gray-900 transition-all duration-200 shadow-sm">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Button --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 hover:border-gray-900 hover:text-gray-900 transition-all duration-200 shadow-sm">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            @else
                <span class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-xl cursor-not-allowed select-none">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>

        {{-- Page info --}}
        <div class="text-sm text-gray-500">
            Showing <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}</span>–<span class="font-semibold text-gray-900">{{ $paginator->lastItem() }}</span> of <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span> articles
        </div>
    </nav>
@endif
