<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $directorId = $request->query('director_id');

        $query = Movie::with('director');

        if ($directorId) {
            $query = $query->where('director_id', $directorId);
        }

        $movies = $query->get();

        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $directors = Director::all();

        return view('movies.create', compact('directors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'release_year' => 'required|integer',
            'is_featured'  => 'required|boolean',
            'director_id'  => 'required|exists:directors,id',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index');
    }
}