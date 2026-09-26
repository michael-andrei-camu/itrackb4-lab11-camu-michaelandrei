<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Requirement A1: Correct use statement

class BookController extends Controller
{
    // Mock dataset
    private array $books = [
        ['id' => 1, 'title' => 'Laravel Essentials', 'genre' => 'Programming', 'year' => 2024],
        ['id' => 2, 'title' => 'Mastering PHP', 'genre' => 'Programming', 'year' => 2023],
        ['id' => 3, 'title' => 'UI/UX Design Fundamentals', 'genre' => 'Design', 'year' => 2024],
        ['id' => 4, 'title' => 'Clean Code Principles', 'genre' => 'Programming', 'year' => 2022],
        ['id' => 5, 'title' => 'Graphic Design Basics', 'genre' => 'Design', 'year' => 2023],
    ];

    /**
     * Requirement A1: Accepts Request object via dependency injection
     */
    public function index(Request $request)
    {
        // Requirement A2: Read query parameters using query() with fallback defaults
        $selectedGenre = $request->query('genre', 'all');
        $selectedYear  = $request->query('year', 'all');

        $items = collect($this->books);

        // Requirement A3 & A4: Individual & combined filtering
        if ($request->filled('genre') && $selectedGenre !== 'all') {
            $items = $items->where('genre', $selectedGenre);
        }

        if ($request->filled('year') && $selectedYear !== 'all') {
            $items = $items->where('year', (int) $selectedYear);
        }

        // Requirement A5: Default full list returned when unfiltered
        return view('books.catalog', [
            'books' => $items->values()->all(),
            'selectedGenre' => $selectedGenre,
            'selectedYear'  => $selectedYear,
        ]);
    }

    public function show($id)
    {
        $book = collect($this->books)->firstWhere('id', (int) $id);

        if (!$book) {
            abort(404);
        }

        return view('books.details', compact('book'));
    }

    // Requirement C5: Keep unfinished store & update stubs for future modules
    public function store(Request $request) {}
    public function update(Request $request, $id) {}
}