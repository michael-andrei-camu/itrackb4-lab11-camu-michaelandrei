<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Fiction', 'Dystopian', 'Sci-Fi', 'Fantasy'] as $name) {
            Genre::firstOrCreate(['name' => $name]);
        }
    }
}
