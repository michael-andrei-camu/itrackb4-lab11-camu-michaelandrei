<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // D1 & D2: Create lookup records first and store in variables
        $nolan = Director::create(['name' => 'Christopher Nolan']);
        $wachowski = Director::create(['name' => 'Lana Wachowski']);
        $miyazaki = Director::create(['name' => 'Hayao Miyazaki']);

        // D3: Create main records pointing to variable IDs
        Movie::create(['title' => 'Inception', 'release_year' => 2010, 'is_featured' => true, 'director_id' => $nolan->id]);
        Movie::create(['title' => 'Interstellar', 'release_year' => 2014, 'is_featured' => true, 'director_id' => $nolan->id]);
        Movie::create(['title' => 'The Matrix', 'release_year' => 1999, 'is_featured' => false, 'director_id' => $wachowski->id]);
        Movie::create(['title' => 'Spirited Away', 'release_year' => 2001, 'is_featured' => true, 'director_id' => $miyazaki->id]);
        Movie::create(['title' => 'Howl\'s Moving Castle', 'release_year' => 2004, 'is_featured' => false, 'director_id' => $miyazaki->id]);
    }
}