<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Redirect root URL to book catalog
Route::get('/', function () {
    return redirect()->route('books.index');
});

// Requirement A6: Single route handles all query parameter permutations
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Requirements C1-C4: Legacy route parameter redirect carrying value over to query string
Route::get('/books/filter/{genre?}', function ($genre = null) {
    if (!$genre) {
        return redirect()->route('books.index');
    }
    return redirect()->route('books.index', ['genre' => $genre]);
})->name('books.old_filter');