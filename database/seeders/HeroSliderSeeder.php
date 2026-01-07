<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Main Brochure',
                'image_path' => 'image/brosur.jpeg',
                'is_featured' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Travel Brochure 3',
                'image_path' => 'image/brosur3.jpeg',
                'is_featured' => false,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'China Tour Brochure',
                'image_path' => 'image/brosurchina.jpeg',
                'is_featured' => false,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Korea Tour Brochure',
                'image_path' => 'image/brosurkorea.jpeg',
                'is_featured' => false,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Ziarah Tour Brochure',
                'image_path' => 'image/brosurziarek.jpeg',
                'is_featured' => false,
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            HeroSlider::create($slider);
        }
    }
}
