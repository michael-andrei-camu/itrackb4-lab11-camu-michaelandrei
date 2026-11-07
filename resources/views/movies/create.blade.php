@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
    <h2 class="mb-4">Add Movie</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                value="{{ old('title') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="release_year" class="form-label">Release Year</label>
            <input
                type="number"
                name="release_year"
                id="release_year"
                class="form-control"
                value="{{ old('release_year') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="director_id" class="form-label">Director</label>
            <select name="director_id" id="director_id" class="form-select" required>
                <option value="">Select a Director</option>
                @foreach ($directors as $director)
                    <option value="{{ $director->id }}" @selected(old('director_id') == $director->id)>
                        {{ $director->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="is_featured" class="form-label">Featured</label>
            <select name="is_featured" id="is_featured" class="form-select" required>
                <option value="">Select an option</option>
                <option value="1" @selected(old('is_featured') === '1')>Yes</option>
                <option value="0" @selected(old('is_featured') === '0')>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Movie</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
