<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Font extends Model
{
    protected $fillable = [
        'name',
        'description',
        'published_date',
        'price',
        'glyphs',
        'supported_encodings',
        'is_variable',
        'features',
        'file_path',
        'font_file_path',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_variable' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function contributors(): BelongsToMany
    {
        return $this->belongsToMany(Contributor::class, 'font_contributors')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function designers(): BelongsToMany
    {
        return $this->contributors()->wherePivot('role', 'designer');
    }

    public function developers(): BelongsToMany
    {
        return $this->contributors()->wherePivot('role', 'developer');
    }
}
