<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Redirect home route '/' directly to '/books'
Route::get('/', function () {
    return redirect()->route('books.index');
});

// A6: Main Index Route
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// C1-C4: Legacy route parameter redirect
Route::get('/books/filter/{genre?}', function ($genre = null) {
    if (!$genre) {
        return redirect()->route('books.index');
    }
    return redirect()->route('books.index', ['genre' => $genre]);
})->name('books.old_filter');