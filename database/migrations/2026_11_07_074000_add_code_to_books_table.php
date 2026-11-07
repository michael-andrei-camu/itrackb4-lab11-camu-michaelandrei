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
            $table->unsignedInteger('code')->nullable()->unique();
        });

        DB::table('books')->orderBy('id')->each(function (object $book): void {
            DB::table('books')
                ->where('id', $book->id)
                ->update(['code' => $book->id]);
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropUnique(['code']);
            $table->dropColumn('code');
        });
    }
};
