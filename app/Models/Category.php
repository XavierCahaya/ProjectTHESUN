<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'icon',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function backgrounds()
    {
        return $this->hasMany(CategoryBackground::class)->orderBy('order');
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    // Helper method to get translation
    public function translate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Boot
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function ($builder) {
            $builder->orderBy('order', 'asc');
        });
    }
}
