
@if ($paginator->hasPages())
    <ul class="pagination pagination-sm pagination-grid" data-page-items="8" data-pagination-anima="fade-bottom" data-options="scrollTop:true">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
           	<li class="prev disabled">
				<a href="#"><i class="fa fa-angle-left"></i><span></span></a>
			</li>
        @else
        	<li class="prev">
				<a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left"></i><span></span></a>
			</li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page active"><a href="#">{{ $page }}</a></li>
                    @else
                    	<li class="page">
							<a href="{{ $url }}">{{ $page }}</a>
						</li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->onFirstPage())
        	<li class="next">
				<a href="{{ $paginator->nextPageUrl() }}" rel="prev"><span></span><i class="fa fa-angle-right"></i></a>
			</li>
        @else
        	<li class="next disabled">
				<a href="#"><span></span><i class="fa fa-angle-left"></i></a>
			</li>
        @endif
    </ul>
@endif
