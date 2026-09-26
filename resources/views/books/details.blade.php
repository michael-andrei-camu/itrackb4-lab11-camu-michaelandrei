```blade
@extends('layouts.app')

@section('title', $book['title'])

@section('content')

    <div class="card shadow-sm">

        <div class="card-body">

            @if(isset($isSpotlight) && $isSpotlight)
                <div class="alert alert-warning">
                    ⭐ This is our Book of the Month!
                </div>
            @endif

            <h2>{{ $book['title'] }}</h2>

            <p class="text-muted">
                by {{ $book['author'] }}
            </p>

            <hr>

            <div class="row">

                <div class="col-md-6">

                    <p>
                        <strong>Book Code:</strong>
                        {{ $book['id'] }}
                    </p>

                    <p>
                        <strong>Genre:</strong>
                        <span class="badge bg-secondary">
                            {{ $book['genre'] }}
                        </span>
                    </p>

                    <p>
                        <strong>Price:</strong>
                        ${{ number_format($book['price'], 2) }}
                    </p>

                </div>

            </div>

            <a href="{{ route('books.catalog') }}"
               class="btn btn-primary">
                ← Back to Catalog
            </a>

        </div>

    </div>

@endsection
```
