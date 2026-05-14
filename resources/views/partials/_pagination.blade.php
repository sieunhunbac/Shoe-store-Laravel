{{-- Simple Pagination Partial --}}
@if ($paginator->hasPages())
    <nav class="flex items-center justify-center gap-2">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Previous</a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-2 text-sm text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Next</a>
        @else
            <span class="px-4 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Next</span>
        @endif
    </nav>
@endif
