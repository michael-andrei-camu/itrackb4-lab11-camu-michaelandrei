@extends('layouts.app')

@section('title', 'Book Catalog')

@section('content')

    @if(isset($currentCategory) && $currentCategory)
        <div class="alert alert-info">
            Currently viewing genre:
            <strong>{{ $currentCategory }}</strong>
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <h2 class="mb-3">📚 Digital Bookstore Directory</h2>

            <p class="text-muted">
                Browse our available books below.
            </p>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="mb-4">

                <strong>Browse Genres:</strong>
                <a href="{{ route('books.create') }}" class="btn btn-sm btn-success">
                    Add a Book
                </a>

                <a href="{{ route('books.genre') }}"
                   class="btn btn-sm btn-outline-primary">
                    All Titles
                </a>

                <a href="{{ route('books.genre', 'Fiction') }}"
                   class="btn btn-sm btn-outline-primary">
                    Fiction
                </a>

                <a href="{{ route('books.genre', 'Dystopian') }}"
                   class="btn btn-sm btn-outline-primary">
                    Dystopian
                </a>

                <a href="{{ route('books.genre', 'Sci-Fi') }}"
                   class="btn btn-sm btn-outline-primary">
                    Sci-Fi
                </a>

                <a href="{{ route('books.spotlight') }}"
                   class="btn btn-sm btn-warning">
                    ⭐ Book of the Month
                </a>

            </div>

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Price ($)</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($books as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item['code'] }}
                                </td>

                                <td>
                                    <strong>{{ $item['title'] }}</strong>
                                </td>

                                <td>
                                    {{ $item['author'] }}
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $item['genre'] }}
                                    </span>
                                </td>

                                <td>
                                    ${{ number_format($item['price'], 2) }}
                                </td>

                                <td>

                                    @if($item['price'] >= 15)
                                        <span class="badge bg-success">
                                            Premium
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            Affordable
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('books.details', $item['id']) }}"
                                       class="btn btn-primary btn-sm">
                                        Read Info
                                    </a>
                                    <a href="{{ route('books.edit', $item['id']) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-4">

                                    <strong>
                                        No books are currently available in our bookstore.
                                    </strong>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
