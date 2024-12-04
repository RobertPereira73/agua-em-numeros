<!-- resources/views/components/pagination.blade.php -->
@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Botão para página anterior --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="#" data-page="{{ $paginator->previousPageUrl() }}" class="paginationItem" rel="prev">&laquo;</a></li>
            @endif

            {{-- Links das páginas --}}
            @foreach ($paginator->links()->elements as $element)
                {{-- Elipses ("...") --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Links numéricos --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="#" data-page="{{ $page }}" class="paginationItem">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botão para próxima página --}}
            @if ($paginator->hasMorePages())
                <li><a href="#" data-page="{{ $paginator->nextPageUrl() }}" class="paginationItem" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endif

<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination a {
        text-decoration: none;
        color: #007bff;
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .pagination .active span {
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .pagination .disabled span {
        color: #aaa;
    }
</style>
