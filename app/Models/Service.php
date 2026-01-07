<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'icon',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_service')
            ->withPivot('is_included')
            ->withTimestamps();
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
}
