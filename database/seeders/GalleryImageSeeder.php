<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['title' => 'Gallery Image 4', 'image_path' => 'image/4.jpeg', 'order' => 1],
            ['title' => 'Gallery Image 1', 'image_path' => 'image/1.jpeg', 'order' => 2],
            ['title' => 'Gallery Image 2', 'image_path' => 'image/2.jpeg', 'order' => 3],
            ['title' => 'Gallery Image 3', 'image_path' => 'image/3.jpeg', 'order' => 4],
            ['title' => 'Gallery Image 5', 'image_path' => 'image/5.jpeg', 'order' => 5],
            ['title' => 'Gallery Image 7', 'image_path' => 'image/7.jpeg', 'order' => 6],
            ['title' => 'Gallery Image 6', 'image_path' => 'image/6.jpeg', 'order' => 7],
            ['title' => 'Gallery Image 9', 'image_path' => 'image/9.jpeg', 'order' => 8],
            ['title' => 'Gallery Image 11', 'image_path' => 'image/11.jpeg', 'order' => 9],
            ['title' => 'Gallery Image 8', 'image_path' => 'image/8.jpeg', 'order' => 10],
            ['title' => 'Gallery Image 12', 'image_path' => 'image/12.jpeg', 'order' => 11],
            ['title' => 'Gallery Image 13', 'image_path' => 'image/13.jpeg', 'order' => 12],
            ['title' => 'Gallery Image 14', 'image_path' => 'image/14.jpeg', 'order' => 13],
            ['title' => 'Gallery Image 15', 'image_path' => 'image/15.jpeg', 'order' => 14],
            ['title' => 'Gallery Image 16', 'image_path' => 'image/16.jpeg', 'order' => 15],
        ];

        foreach ($images as $image) {
            GalleryImage::create([
                'title' => $image['title'],
                'image_path' => $image['image_path'],
                'order' => $image['order'],
                'is_active' => true,
            ]);
        }
    }
}
