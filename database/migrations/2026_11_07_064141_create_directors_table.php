<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Create lookup table
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Drop old text column from main table
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('director');
        });

        // 3. Add foreign key column
        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('director_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['director_id']);
            $table->dropColumn('director_id');
            $table->string('director')->nullable();
        });

        Schema::dropIfExists('directors');
    }
};