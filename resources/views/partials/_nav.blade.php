<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('books.index') }}">BookTracker</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- D1-D4: Wildcard match keeps active state on detail & filtered list pages -->
                    <a class="nav-link {{ request()->is('books*') ? 'active fw-bold' : '' }}" 
                       href="{{ route('books.index') }}">
                       Books
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>