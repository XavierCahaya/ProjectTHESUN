<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'is_featured',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Scope untuk data active saja
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk featured slider
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope untuk regular slider (non-featured)
    public function scopeRegular($query)
    {
        return $query->where('is_featured', false);
    }

    // Default ordering
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('order', 'asc');
        });
    }
}
