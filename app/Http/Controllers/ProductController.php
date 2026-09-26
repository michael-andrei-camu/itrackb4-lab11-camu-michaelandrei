<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = [
            ['title' => 'Avatar', 'genre' => 'Sci-Fi', 'rating' => '7.9'],
            ['title' => 'The Matrix', 'genre' => 'Action', 'rating' => '8.7'],
            ['title' => 'Jurassic Park', 'genre' => 'Adventure', 'rating' => '8.2'],
            ['title' => 'Gladiator', 'genre' => 'Drama', 'rating' => '8.5'],
            ['title' => 'WALL-E', 'genre' => 'Animation', 'rating' => '8.4'],
        ];

        return view('movies.index', compact('movies'));
    }
}