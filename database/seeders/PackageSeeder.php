<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Package;
use App\Models\PackageTranslation;
use App\Models\PackageImage;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $domestic = Category::where('slug', 'domestic')->first();
        $international = Category::where('slug', 'international')->first();

        // Domestic Packages
        $this->createPackage($domestic->id, [
            'slug' => 'semarang-tour',
            'thumbnail' => 'image/brosursemarang.jpeg',
            'price' => 500000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Wisata Semarang', 'description' => 'Jelajahi kota Semarang dengan paket 2D1N'],
                'en' => ['title' => 'Semarang Tour', 'description' => 'Explore Semarang city with 2D1N package'],
            ],
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'dieng-plateau',
            'thumbnail' => 'image/brosurdieng.jpeg',
            'price' => 750000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Dataran Tinggi Dieng', 'description' => 'Nikmati keindahan Dieng Plateau'],
                'en' => ['title' => 'Dieng Plateau', 'description' => 'Enjoy the beauty of Dieng Plateau'],
            ],
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'karimunjawa',
            'thumbnail' => 'image/brosurkarimun.jpeg',
            'price' => 1500000,
            'duration_days' => 3,
            'duration_nights' => 2,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Karimunjawa Paradise', 'description' => 'Surga tersembunyi di Jawa Tengah'],
                'en' => ['title' => 'Karimunjawa Paradise', 'description' => 'Hidden paradise in Central Java'],
            ],
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'magelang-tour',
            'thumbnail' => 'image/brosurmagelang.jpeg',
            'price' => 600000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Wisata Magelang', 'description' => 'Kunjungi Borobudur dan sekitarnya'],
                'en' => ['title' => 'Magelang Tour', 'description' => 'Visit Borobudur and surroundings'],
            ],
        ]);

        // International Packages
        $this->createPackage($international->id, [
            'slug' => 'korea-winter',
            'thumbnail' => 'image/brosurkorea.jpeg',
            'price' => 15000000,
            'duration_days' => 5,
            'duration_nights' => 4,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Korea Musim Dingin', 'description' => 'Nikmati salju Korea Selatan'],
                'en' => ['title' => 'Korea Winter Tour', 'description' => 'Enjoy snow in South Korea'],
            ],
        ]);

        $this->createPackage($international->id, [
            'slug' => 'japan-sakura',
            'thumbnail' => 'image/brosurjepang.jpeg',
            'price' => 20000000,
            'duration_days' => 6,
            'duration_nights' => 5,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Jepang Musim Sakura', 'description' => 'Saksikan keindahan bunga sakura'],
                'en' => ['title' => 'Japan Sakura Season', 'description' => 'Witness the beauty of cherry blossoms'],
            ],
        ]);

        $this->createPackage($international->id, [
            'slug' => 'china-heritage',
            'thumbnail' => 'image/brosurchina.jpeg',
            'price' => 18000000,
            'duration_days' => 7,
            'duration_nights' => 6,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Warisan Budaya China', 'description' => 'Jelajahi sejarah dan budaya China'],
                'en' => ['title' => 'China Heritage Tour', 'description' => 'Explore China history and culture'],
            ],
        ]);

        $this->createPackage($international->id, [
            'slug' => 'vietnam-adventure',
            'thumbnail' => 'image/brosurvietnam.jpeg',
            'price' => 12000000,
            'duration_days' => 5,
            'duration_nights' => 4,
            'is_featured' => true,
            'translations' => [
                'id' => ['title' => 'Petualangan Vietnam', 'description' => 'Eksplorasi keindahan Vietnam'],
                'en' => ['title' => 'Vietnam Adventure', 'description' => 'Explore the beauty of Vietnam'],
            ],
        ]);
    }

    private function createPackage($categoryId, $data)
    {
        $package = Package::create([
            'category_id' => $categoryId,
            'slug' => $data['slug'],
            'thumbnail' => $data['thumbnail'],
            'price' => $data['price'],
            'duration_days' => $data['duration_days'],
            'duration_nights' => $data['duration_nights'],
            'is_featured' => $data['is_featured'] ?? false,
            'is_active' => true,
            'order' => 0,
        ]);

        foreach ($data['translations'] as $locale => $translation) {
            PackageTranslation::create([
                'package_id' => $package->id,
                'locale' => $locale,
                'title' => $translation['title'],
                'description' => $translation['description'],
            ]);
        }
    }
}
