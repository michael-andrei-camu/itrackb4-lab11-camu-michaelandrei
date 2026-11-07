<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);

// Custom routes must come BEFORE the resource route
Route::get('/books/spotlight', [BookController::class, 'spotlight'])
    ->name('books.spotlight');

Route::get('/books/genre/{category?}', [BookController::class, 'categoryFilter'])
    ->name('books.genre');

// Resource routes
Route::resource('books', BookController::class)
    ->names([
        'index' => 'books.catalog',
        'show' => 'books.details',
    ]);

Route::resource('movies', MovieController::class)
    ->only(['index', 'create', 'store']);
