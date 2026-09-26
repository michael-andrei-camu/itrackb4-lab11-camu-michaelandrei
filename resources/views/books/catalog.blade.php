@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Book Catalog</h2>

    <!-- Requirement B5: Displays active filters -->
    <div class="alert alert-secondary py-2 mb-3">
        <small class="text-uppercase fw-bold">Active Filters:</small> 
        <span class="badge bg-primary">Genre: {{ $selectedGenre }}</span>
        <span class="badge bg-info text-dark">Year: {{ $selectedYear }}</span>
    </div>

    <!-- Filter Links Section -->
    <div class="card card-body mb-4 bg-light">
        <!-- Requirement B1 & B2: Genre Filter Links (Preserves Year) -->
        <div class="mb-2">
            <strong>Genre:</strong>
            <a href="{{ route('books.index', array_filter(['genre' => 'Programming', 'year' => request('year')])) }}" class="btn btn-link btn-sm p-0 me-2">Programming</a>
            <a href="{{ route('books.index', array_filter(['genre' => 'Design', 'year' => request('year')])) }}" class="btn btn-link btn-sm p-0 me-2">Design</a>
        </div>

        <!-- Requirement B1 & B2: Year Filter Links (Preserves Genre) -->
        <div class="mb-2">
            <strong>Year:</strong>
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2024])) }}" class="btn btn-link btn-sm p-0 me-2">2024</a>
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2023])) }}" class="btn btn-link btn-sm p-0 me-2">2023</a>
            <a href="{{ route('books.index', array_filter(['genre' => request('genre'), 'year' => 2022])) }}" class="btn btn-link btn-sm p-0 me-2">2022</a>
        </div>

        <!-- Requirement B3: Clear both filters at once -->
        <div>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-dark mt-2">Clear All Filters</a>
        </div>
    </div>

    <!-- Table Display -->
    <table class="table table-hover align-middle">
        <thead class="table-dark">
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
                    <td><span class="badge bg-secondary">{{ $book['genre'] }}</span></td>
                    <td>{{ $book['year'] }}</td>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}" class="btn btn-sm btn-primary">Details</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No books match the selected criteria.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection