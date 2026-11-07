@extends('layouts.app')

@section('title', 'Movies')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Movies</h2>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add Movie</a>
    </div>

    @if ($movies->isEmpty())
        <div class="alert alert-info">No movies are available.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Release Year</th>
                        <th>Director</th>
                        <th>Featured</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->release_year }}</td>
                            <td>{{ $movie->director->name }}</td>
                            <td>{{ $movie->is_featured ? 'Yes' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
