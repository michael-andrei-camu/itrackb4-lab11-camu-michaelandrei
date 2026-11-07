<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('genre_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
        });

        DB::table('books')
            ->whereNotNull('genre')
            ->orderBy('id')
            ->each(function (object $book): void {
                $genreId = DB::table('genres')
                    ->where('name', $book->genre)
                    ->value('id');

                if ($genreId === null) {
                    $genreId = DB::table('genres')->insertGetId([
                        'name' => $book->genre,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                DB::table('books')
                    ->where('id', $book->id)
                    ->update(['genre_id' => $genreId]);
            });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropConstrainedForeignId('genre_id');
        });
    }
};
