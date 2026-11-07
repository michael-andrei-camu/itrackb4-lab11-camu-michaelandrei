<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'release_year',
        'is_featured',
        'director_id', // Replaced 'director' with 'director_id'
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'release_year' => 'integer',
        ];
    }

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }
}