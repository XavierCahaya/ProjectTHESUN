<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch active hero sliders (1 featured + 4 regular)
        $heroSliders = HeroSlider::active()->get();

        // Fetch all active gallery images
        $galleryImages = GalleryImage::active()->get();

        return view('home', compact('heroSliders', 'galleryImages'));
    }
}
