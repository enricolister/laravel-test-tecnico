<nav>
    <ul class="pagination justify-content-end">
        @if($previousPage)
            <li class="page-item">
                <a class="page-link" href="{{ route('callInternalBeers', ['token' => $token, 'page' => $previousPage]) }}" tabindex="-1">Precedente</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Precedente</a>
            </li>
        @endif
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-disabled="true">{{ $page }}</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ route('callInternalBeers', ['token' => $token, 'page' => $nextPage]) }}">Successiva</a>
        </li>
    </ul>
</nav>
