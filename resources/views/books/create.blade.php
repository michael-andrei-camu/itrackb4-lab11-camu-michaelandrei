@extends('layouts.app')

@section('title', 'Add a Book')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-3">Add a Book</h2>

            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="code" class="form-label">Book Code</label>
                    <input type="number" name="code" id="code" class="form-control" value="{{ old('code') }}" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" maxlength="255" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" maxlength="255" required>
                </div>

                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-select" required>
                        <option value="">Select a genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" min="0" max="999999.99" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Book</button>
                <a href="{{ route('books.catalog') }}" class="btn btn-secondary">Back to Catalog</a>
            </form>
        </div>
    </div>
@endsection
