<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['id' => 101, 'title' => 'To Kill', 'author' => 'Harper Lee', 'genre' => 'Fiction', 'price' => 14.99],
            ['id' => 102, 'title' => 'I love you since 1875', 'author' => 'George Orwell', 'genre' => 'Dystopian', 'price' => 12.50],
            ['id' => 103, 'title' => 'Mastermind', 'author' => 'F. Scott Fitzgerald', 'genre' => 'Fiction', 'price' => 10.99],
            ['id' => 104, 'title' => 'Mafia Boss', 'author' => 'Frank Herbert', 'genre' => 'Sci-Fi', 'price' => 18.25],
            ['id' => 105, 'title' => 'Harry Potter', 'author' => 'J.R.R. Tolkien', 'genre' => 'Fantasy', 'price' => 15.00],
            ['id' => 106, 'title' => 'Fahrenheit 451', 'author' => 'Ray Bradbury', 'genre' => 'Dystopian', 'price' => 11.75],
        ];

        foreach ($books as $book) {
            $genre = Genre::firstOrCreate(['name' => $book['genre']]);

            Book::updateOrCreate(
                ['id' => $book['id']],
                [
                    'code' => $book['id'],
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'genre' => $book['genre'],
                    'genre_id' => $genre->id,
                    'price' => $book['price'],
                ],
            );
        }
    }
}
