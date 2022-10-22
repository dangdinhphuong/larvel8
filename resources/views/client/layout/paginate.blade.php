@if ($paginator->hasPages())
    <div class="pagination col-12">
        <div class="prev">
            @if ($paginator->onFirstPage())
                <a>
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            @endif
        </div>
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="pagination__item">{{ $element }}</div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="pagination__item active"><a>{{ $page }}</a></div>
                    @else
                        <div class="pagination__item"><a href="{{ $url }}">{{ $page }}</a></div>
                    @endif
                @endforeach
            @endif
        @endforeach

        <div class="next">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            @else
                <a>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            @endif
        </div>
    </div>
@endif
