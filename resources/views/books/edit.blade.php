@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-3">Edit Book</h2>

            @if (session('status'))
                <div class="alert alert-info">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="code" class="form-label">Book Code</label>
                    <input
                        type="number"
                        name="code"
                        id="code"
                        class="form-control"
                        value="{{ old('code', $book->code) }}"
                        min="1"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        value="{{ old('title', $book->title) }}"
                        maxlength="255"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input
                        type="text"
                        name="author"
                        id="author"
                        class="form-control"
                        value="{{ old('author', $book->author) }}"
                        maxlength="255"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-select" required>
                        <option value="">Select a genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @selected(old('genre_id', $book->genre_id) == $genre->id)>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="form-control"
                        value="{{ old('price', $book->price) }}"
                        min="0"
                        max="999999.99"
                        step="0.01"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
                <button
                    type="submit"
                    name="_action"
                    value="old-input-redirect"
                    formnovalidate
                    class="btn btn-outline-info"
                >
                    Old Filter Redirect
                </button>
                <a href="{{ route('books.details', $book) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
