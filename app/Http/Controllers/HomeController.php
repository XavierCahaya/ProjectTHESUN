<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\GalleryImage;
use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'id');

        // Fetch active hero sliders (1 featured + 4 regular)
        $heroSliders = HeroSlider::active()->get();

        // Fetch all active gallery images
        $galleryImages = GalleryImage::active()->get();

        // Fetch featured domestic packages (max 4)
        $domesticPackages = Package::whereHas('category', function ($q) {
            $q->where('slug', 'domestic');
        })
            ->where('is_featured', true)
            ->where('is_active', true)
            ->with(['translations' => fn($q) => $q->where('locale', $locale)])
            ->orderBy('order')
            ->take(4)
            ->get();

        // Fetch featured international packages (max 4)
        $internationalPackages = Package::whereHas('category', function ($q) {
            $q->where('slug', 'international');
        })
            ->where('is_featured', true)
            ->where('is_active', true)
            ->with(['translations' => fn($q) => $q->where('locale', $locale)])
            ->orderBy('order')
            ->take(4)
            ->get();

        return view('home', compact('heroSliders', 'galleryImages', 'domesticPackages', 'internationalPackages'));
    }
}
