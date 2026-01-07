<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $locale = session('locale', 'id');

        $categories = Category::active()
            ->with([
                'translations' => fn($q) => $q->where('locale', $locale),
                'backgrounds' => fn($q) => $q->where('is_active', true)->orderBy('order'),
                'packages' => fn($q) => $q->where('is_active', true)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->with(['translations' => fn($q2) => $q2->where('locale', $locale)])
            ])
            ->orderBy('order')
            ->get();

        return view('packages', compact('categories', 'locale'));
    }
}
