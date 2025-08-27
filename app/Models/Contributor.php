<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contributor extends Model
{
    protected $fillable = [
        'name',
        'is_designer',
        'is_developer',
        'photo_path',
        'website',
        'facebook',
        'instagram',
        'twitter',
    ];

    protected $casts = [
        'is_designer' => 'boolean',
        'is_developer' => 'boolean',
    ];

    public function fonts(): BelongsToMany
    {
        return $this->belongsToMany(Font::class, 'font_contributors')
            ->withPivot('role')
            ->withTimestamps();
    }
}
