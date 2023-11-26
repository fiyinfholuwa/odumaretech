                @if ($paginator->lastPage() > 1)
                    <div class="row portfolio container">
                        <div class="col-12 load-more">
                            <a class="btn" href="{{ $paginator->url($paginator->currentPage()-1) }}">Prev</a>
                            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <a href="{{ $paginator->url($i) }}" class="page2">{{ $i }}</a>
                            @endfor
                            <a class="btn" href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>
                        </div>
                    </div>

                @endif

