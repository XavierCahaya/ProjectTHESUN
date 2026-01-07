<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'locale',
        'title',
        'description',
        'itinerary',
        'terms_conditions',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
