@if ($paginator->hasPages())
    <div class="pagination" style="">
        @if ($paginator->onFirstPage())
            <a>&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" id="condition">&laquo;</a>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#" disabled>{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="#" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">&raquo;</a>
        @else
            <a>&raquo;</a>
        @endif
     </div>
@endif
