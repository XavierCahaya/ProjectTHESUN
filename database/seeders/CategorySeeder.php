<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\CategoryBackground;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Category 1: Domestik
        $domestic = Category::create([
            'slug' => 'domestic',
            'icon' => null,
            'is_active' => true,
            'order' => 1,
        ]);

        CategoryTranslation::create([
            'category_id' => $domestic->id,
            'locale' => 'id',
            'name' => 'DOMESTIK',
            'description' => 'Paket Wisata Domestik Indonesia',
        ]);

        CategoryTranslation::create([
            'category_id' => $domestic->id,
            'locale' => 'en',
            'name' => 'DOMESTIC',
            'description' => 'Indonesia Domestic Tour Packages',
        ]);

        // Backgrounds untuk domestik
        CategoryBackground::create([
            'category_id' => $domestic->id,
            'image_path' => 'image/semarang.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        CategoryBackground::create([
            'category_id' => $domestic->id,
            'image_path' => 'image/borobudur.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        CategoryBackground::create([
            'category_id' => $domestic->id,
            'image_path' => 'image/karimun.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        // Category 2: International
        $international = Category::create([
            'slug' => 'international',
            'icon' => null,
            'is_active' => true,
            'order' => 2,
        ]);

        CategoryTranslation::create([
            'category_id' => $international->id,
            'locale' => 'id',
            'name' => 'INTERNASIONAL',
            'description' => 'Paket Wisata Internasional',
        ]);

        CategoryTranslation::create([
            'category_id' => $international->id,
            'locale' => 'en',
            'name' => 'INTERNATIONAL',
            'description' => 'International Tour Packages',
        ]);

        // Backgrounds untuk international
        CategoryBackground::create([
            'category_id' => $international->id,
            'image_path' => 'image/korea.jpg',
            'order' => 1,
            'is_active' => true,
        ]);

        CategoryBackground::create([
            'category_id' => $international->id,
            'image_path' => 'image/jepang.jpg',
            'order' => 2,
            'is_active' => true,
        ]);

        CategoryBackground::create([
            'category_id' => $international->id,
            'image_path' => 'image/china.jpg',
            'order' => 3,
            'is_active' => true,
        ]);

        CategoryBackground::create([
            'category_id' => $international->id,
            'image_path' => 'image/vietnam2.jpg',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
