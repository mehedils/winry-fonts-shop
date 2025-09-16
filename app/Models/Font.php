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
        'preview_image_path',
        'preview_images',
        'slider_images',
        'category_id',
        'downloads_count',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_variable' => 'boolean',
        'price' => 'decimal:2',
        'downloads_count' => 'integer',
        'preview_images' => 'array',
        'slider_images' => 'array',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Increment the download count for this font
     */
    public function incrementDownloadCount()
    {
        $this->increment('downloads_count');
    }

    /**
     * Check if this is a premium font that requires preview images
     * Premium fonts use PNG preview images instead of actual font files for security
     */
    public function isPremium(): bool
    {
        return $this->price > 0;
    }

    /**
     * Check if this font has a secure preview (images for premium, font file for free)
     */
    public function hasSecurePreview(): bool
    {
        if ($this->isPremium()) {
            return !empty($this->preview_image_path) || (!empty($this->slider_images) && count($this->slider_images) > 0);
        }
        return !empty($this->font_file_path);
    }

    /**
     * Get preview image for font cards (single image)
     */
    public function getPreviewImage(): ?string
    {
        if ($this->isPremium()) {
            return $this->preview_image_path;
        }
        return null;
    }

    /**
     * Get slider images for premium fonts
     */
    public function getSliderImages(): array
    {
        if ($this->isPremium()) {
            return $this->slider_images ?? [];
        }
        return [];
    }
}
