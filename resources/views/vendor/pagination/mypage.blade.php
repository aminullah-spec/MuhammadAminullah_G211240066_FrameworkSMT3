<html>
<body>
        
        @if ($paginator->hasPages())
        <div style="margin-top: 15px;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <span>« Previous</span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">« Previous</a>
            @endif
            
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <span>{{ $element }}</span>
            @endif
            
            {{-- Array of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span><b>[{{ $page }}]</b></span>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
            @endforeach
            @endif
            @endforeach
            
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next »</a>
            @else
            <span>Next »</span>
            @endif
        </div>
        @endif
        
</body>
</html>