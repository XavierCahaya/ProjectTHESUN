<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Package;
use App\Models\PackageTranslation;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $domestic = Category::where('slug', 'domestic')->first();
        $international = Category::where('slug', 'international')->first();

        // ==== DOMESTIC PACKAGES ====

        // Paket Golf Semarang
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosursemarang.jpeg',
            'price' => 2500000,
            'duration_days' => 3,
            'duration_nights' => 2,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Golf : Semarang',
                    'description' => 'Paket golf eksklusif di Semarang dengan fasilitas lengkap',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 3 Hari 2 Malam</li><li>2. Minimal 4 Peserta</li></ul>'
                ],
                'en' => [
                    'title' => 'Golf Package : Semarang',
                    'description' => 'Exclusive golf package in Semarang with complete facilities',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 3 Days 2 Nights</li><li>2. Minimum 4 Participants</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4]
        ]);

        // Paket Dieng
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosurdieng.jpeg',
            'price' => 1200000,
            'duration_days' => 4,
            'duration_nights' => 3,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Dieng 4 Hari 3 Malam',
                    'description' => 'Nikmati keindahan Dataran Tinggi Dieng dengan paket lengkap',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 5 Lokasi Wisata Dieng</li><li>2. Private Transport</li><li>3. Air mineral, Makan, Biaya Tol</li><li>4. Perahu Telaga Menjer</li></ul>'
                ],
                'en' => [
                    'title' => 'Dieng Package 4 Days 3 Nights',
                    'description' => 'Enjoy the beauty of Dieng Plateau with complete package',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 5 Dieng Tourist Locations</li><li>2. Private Transport</li><li>3. Mineral water, Meals, Toll Fees</li><li>4. Telaga Menjer Boat</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4]
        ]);

        // Paket Karimunjawa
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosurkarimun.jpeg',
            'price' => 1500000,
            'duration_days' => 3,
            'duration_nights' => 2,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Karimunjawa 3 Hari 2 Malam',
                    'description' => 'Surga tersembunyi di Jawa Tengah dengan pantai pasir putih',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Kunjungan 3 pulau</li><li>2. Homestay, Hotel, Cottage</li><li>3. Makan Pagi, Makan Siang, Makan Malam</li></ul>'
                ],
                'en' => [
                    'title' => 'Karimunjawa Package 3 Days 2 Nights',
                    'description' => 'Hidden paradise in Central Java with white sand beaches',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Visit 3 islands</li><li>2. Homestay, Hotel, Cottage</li><li>3. Breakfast, Lunch, Dinner</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4, 5]
        ]);

        // Paket Magelang
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosurmagelang.jpeg',
            'price' => 900000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Magelang',
                    'description' => 'Kunjungi destinasi wisata menarik di Magelang',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Nepal Van Java</li><li>2. Gereja Ayam</li><li>3. Svargabumi</li><li>4. VW Touring</li><li>5. Candi Borobudur</li></ul>'
                ],
                'en' => [
                    'title' => 'Magelang Package',
                    'description' => 'Visit interesting tourist destinations in Magelang',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Nepal Van Java</li><li>2. Chicken Church</li><li>3. Svargabumi</li><li>4. VW Touring</li><li>5. Borobudur Temple</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4, 5]
        ]);

        // Paket Magelang Ziarah Buddha
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosurmagelang.jpeg',
            'price' => 800000,
            'duration_days' => 1,
            'duration_nights' => 0,
            'is_featured' => false,
            'translations' => [
                'id' => [
                    'title' => 'Paket Magelang : Ziarah Buddha',
                    'description' => 'Paket ziarah ke candi-candi Buddha di Magelang',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Candi Mendut</li><li>2. Candi Pawon</li><li>3. Candi Borobudur</li><li>4. Pradhaksina, Fang Sheng, Blessing</li></ul>'
                ],
                'en' => [
                    'title' => 'Magelang Package : Buddhist Pilgrimage',
                    'description' => 'Pilgrimage package to Buddhist temples in Magelang',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Mendut Temple</li><li>2. Pawon Temple</li><li>3. Borobudur Temple</li><li>4. Pradhaksina, Fang Sheng, Blessing</li></ul>'
                ],
            ],
            'services' => [2, 3, 4, 5]
        ]);

        // Paket Solo
        $this->createPackage($domestic->id, [
            'thumbnail' => 'image/brosursolo.jpeg',
            'price' => 1100000,
            'duration_days' => 4,
            'duration_nights' => 3,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Solo 4 Hari 3 Malam',
                    'description' => 'Jelajahi kota budaya Solo dengan paket lengkap',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 6 Lokasi Wisata Solo</li><li>2. Hotel Bintang 3</li><li>3. Makan Pagi</li><li>4. Transportasi Lokal</li></ul>'
                ],
                'en' => [
                    'title' => 'Solo Package 4 Days 3 Nights',
                    'description' => 'Explore Solo cultural city with complete package',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 6 Solo Tourist Locations</li><li>2. 3-Star Hotel</li><li>3. Breakfast</li><li>4. Local Transportation</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4]
        ]);

        // ==== INTERNATIONAL PACKAGES ====

        // Korea
        $this->createPackage($international->id, [
            'thumbnail' => 'image/brosurkorea.jpeg',
            'price' => 18000000,
            'duration_days' => 6,
            'duration_nights' => 5,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Korea 6 Hari',
                    'description' => 'Nikmati keindahan Korea Selatan dengan paket lengkap',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Bis perjalanan</li><li>2. Hotel (Twin Bed/Triple Bed)</li><li>3. Pemandu Tur</li><li>4. Perlengkapan perjalanan</li><li>5. Asuransi perjalanan</li></ul>'
                ],
                'en' => [
                    'title' => 'Korea Package 6 Days',
                    'description' => 'Enjoy the beauty of South Korea with complete package',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. Tour bus</li><li>2. Hotel (Twin Bed/Triple Bed)</li><li>3. Tour Guide</li><li>4. Travel equipment</li><li>5. Travel insurance</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6]
        ]);

        // Vietnam 5 Hari
        $this->createPackage($international->id, [
            'thumbnail' => 'image/brosurvietnam.jpeg',
            'price' => 12000000,
            'duration_days' => 5,
            'duration_nights' => 4,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Paket Vietnam 5 Hari',
                    'description' => 'Jelajahi keindahan Vietnam dari Hanoi hingga Ha Long Bay',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 5 Hari</li><li>2. 4 Destinasi Wisata</li><li>3. Hotel Bintang 3 (Twin/Triple)</li><li>4. Perlengkapan Perjalanan</li><li>5. Asuransi Perjalanan</li></ul>'
                ],
                'en' => [
                    'title' => 'Vietnam Package 5 Days',
                    'description' => 'Explore the beauty of Vietnam from Hanoi to Ha Long Bay',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 5 Days</li><li>2. 4 Tourist Destinations</li><li>3. 3-Star Hotel (Twin/Triple)</li><li>4. Travel Equipment</li><li>5. Travel Insurance</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6]
        ]);

        // Vietnam 6 Hari
        $this->createPackage($international->id, [
            'thumbnail' => 'image/brosurvietnam.jpeg',
            'price' => 14000000,
            'duration_days' => 6,
            'duration_nights' => 5,
            'is_featured' => false,
            'translations' => [
                'id' => [
                    'title' => 'Paket Vietnam 6 Hari',
                    'description' => 'Paket Vietnam extended dengan lebih banyak destinasi',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 6 Hari</li><li>2. 4 Destinasi Wisata</li><li>3. Hotel Bintang 3 (Twin/Triple)</li><li>4. Perlengkapan Perjalanan</li><li>5. Asuransi Perjalanan</li></ul>'
                ],
                'en' => [
                    'title' => 'Vietnam Package 6 Days',
                    'description' => 'Extended Vietnam package with more destinations',
                    'itinerary' => null,
                    'terms_conditions' => '<ul><li>1. 6 Hari</li><li>2. 4 Destinasi Wisata</li><li>3. Hotel Bintang 3 (Twin/Triple)</li><li>4. Perlengkapan Perjalanan</li><li>5. Asuransi Perjalanan</li></ul>'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6]
        ]);
    }

    private function createPackage($categoryId, $data)
    {
        $package = Package::create([
            'category_id' => $categoryId,
            'slug' => 'temp-slug-' . uniqid(), // akan di-generate otomatis dari title
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
                'itinerary' => $translation['itinerary'] ?? null,
                'terms_conditions' => $translation['terms_conditions'] ?? null,
            ]);
        }

        // Update slug from Indonesian title
        $idTranslation = $package->translations()->where('locale', 'id')->first();
        if ($idTranslation) {
            $package->update(['slug' => \Illuminate\Support\Str::slug($idTranslation->title)]);
        }

        // Attach services if provided
        if (isset($data['services']) && is_array($data['services'])) {
            $package->services()->attach($data['services']);
        }
    }
}
