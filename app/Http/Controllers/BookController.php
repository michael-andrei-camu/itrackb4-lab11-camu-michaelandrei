<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Req A1: Import Request class

class BookController extends Controller
{
    // Mock data array (or replace with your actual data source)
    private $books = [
        ['id' => 1, 'title' => 'Laravel Essentials', 'genre' => 'Programming', 'year' => 2024],
        ['id' => 2, 'title' => 'Mastering PHP', 'genre' => 'Programming', 'year' => 2023],
        ['id' => 3, 'title' => 'UI/UX Design Fundamentals', 'genre' => 'Design', 'year' => 2024],
        ['id' => 4, 'title' => 'Clean Code Principles', 'genre' => 'Programming', 'year' => 2022],
        ['id' => 5, 'title' => 'Graphic Design Basics', 'genre' => 'Design', 'year' => 2023],
    ];

    /**
     * Requirement A1: Takes Request $request with correct use statement
     */
    public function index(Request $request)
    {
        // Requirement A2: Read two values from query string with sensible defaults
        $genre = $request->query('genre', 'all');
        $year  = $request->query('year', 'all');

        $filteredBooks = collect($this->books);

        // Requirement A3 & A4: Filter by genre if provided and not 'all'
        if ($request->filled('genre') && $genre !== 'all') {
            $filteredBooks = $filteredBooks->where('genre', $genre);
        }

        // Requirement A3 & A4: Filter by year if provided and not 'all'
        if ($request->filled('year') && $year !== 'all') {
            $filteredBooks = $filteredBooks->where('year', (int)$year);
        }

        // Requirement A5: Unfiltered array returns full list
        return view('books.catalog', [
            'books' => $filteredBooks->values()->all(),
            'currentGenre' => $genre,
            'currentYear'  => $year,
        ]);
    }

    public function show($id)
    {
        $book = collect($this->books)->firstWhere('id', (int)$id);

        if (!$book) {
            abort(404);
        }

        return view('books.details', compact('book'));
    }

    // Keep store and update empty for future labs as instructed in Part C
    public function store(Request $request) {}
    public function update(Request $request, $id) {}
}