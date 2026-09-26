@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Book Catalog</h1>

    <!-- B5: State which filters are currently active -->
    <div class="alert alert-info">
        <strong>Active Filters:</strong> 
        Genre: <u>{{ $currentGenre }}</u> | Year: <u>{{ $currentYear }}</u>
    </div>

    <!-- Filter Link Section -->
    <div class="mb-4">
        <!-- Genre Filters (Preserves Year) -->
        <div class="mb-2">
            <strong>Genre:</strong>
            <a href="{{ route('books.index', array_filter(['genre' => 'Programming', 'year' => request('year')])) }}">Programming</a> |
            <a href="{{ route('books.index', array_filter(['genre' => 'Design', 'year' => request('year')])) }}">Design</a>
        </div>

        <!-- Year Filters (Preserves Genre) -->
        <div class="mb-2">
            <strong>Year:</strong>
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2024])) }}">2024</a> |
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2023])) }}">2023</a> |
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2022])) }}">2022</a>
        </div>

        <!-- B3: Clear both filters at once -->
        <div>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-danger">Clear All Filters</a>
        </div>
    </div>

    <!-- Books Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['genre'] }}</td>
                    <td>{{ $book['year'] }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No books match the selected filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection