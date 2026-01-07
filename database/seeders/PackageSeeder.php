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
                'id' => [
                    'title' => 'Wisata Semarang',
                    'description' => 'Jelajahi kota Semarang dengan paket 2D1N yang menakjubkan',
                    'itinerary' => "Hari 1:\n- 08:00 Keberangkatan dari meeting point\n- 10:00 Tiba di Kota Lama Semarang\n- 12:00 Lunch di restoran lokal\n- 14:00 Lawang Sewu\n- 16:00 Sam Poo Kong\n- 18:00 Check-in hotel\n\nHari 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Mengunjung Goa Kreo\n- 12:00 Lunch\n- 14:00 Kembali ke meeting point",
                    'terms_conditions' => 'Harga sudah termasuk transportasi, makan 3x, dan hotel. Belum termasuk tiket masuk wisata.'
                ],
                'en' => [
                    'title' => 'Semarang Tour',
                    'description' => 'Explore Semarang city with amazing 2D1N package',
                    'itinerary' => "Day 1:\n- 08:00 Departure from meeting point\n- 10:00 Arrive at Kota Lama Semarang\n- 12:00 Lunch at local restaurant\n- 14:00 Lawang Sewu\n- 16:00 Sam Poo Kong\n- 18:00 Hotel check-in\n\nDay 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Visit Goa Kreo\n- 12:00 Lunch\n- 14:00 Return to meeting point",
                    'terms_conditions' => 'Price includes transportation, 3x meals, and hotel. Does not include entrance tickets.'
                ],
            ],
            'services' => [1, 2, 3, 4] // hotel, transport, tour-guide, meals
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'dieng-plateau',
            'thumbnail' => 'image/brosurdieng.jpeg',
            'price' => 750000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Dataran Tinggi Dieng',
                    'description' => 'Nikmati keindahan Dieng Plateau dengan candi dan kawah berwarna',
                    'itinerary' => "Hari 1:\n- 05:00 Keberangkatan dari meeting point\n- 08:00 Tiba di Dieng, menikmati sunrise di Bukit Sikunir\n- 10:00 Kawah Sikidang dan Telaga Warna\n- 12:00 Lunch\n- 14:00 Kompleks Candi Arjuna\n- 16:00 Pasar Dieng\n- 18:00 Check-in hotel\n\nHari 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Telaga Cebong dan foto spot\n- 12:00 Lunch\n- 15:00 Kembali ke meeting point",
                    'terms_conditions' => 'Harga sudah termasuk transportasi AC, makan 3x, hotel, dan tour guide. Belum termasuk tiket masuk wisata. Minimal 10 peserta.'
                ],
                'en' => [
                    'title' => 'Dieng Plateau',
                    'description' => 'Enjoy the beauty of Dieng Plateau with temples and colorful craters',
                    'itinerary' => "Day 1:\n- 05:00 Departure from meeting point\n- 08:00 Arrive at Dieng, enjoy sunrise at Sikunir Hill\n- 10:00 Sikidang Crater and Telaga Warna\n- 12:00 Lunch\n- 14:00 Arjuna Temple Complex\n- 16:00 Dieng Market\n- 18:00 Hotel check-in\n\nDay 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Telaga Cebong and photo spots\n- 12:00 Lunch\n- 15:00 Return to meeting point",
                    'terms_conditions' => 'Price includes AC transportation, 3x meals, hotel, and tour guide. Does not include entrance tickets. Minimum 10 participants.'
                ],
            ],
            'services' => [1, 2, 3, 4] // hotel, transport, tour-guide, meals
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'karimunjawa',
            'thumbnail' => 'image/brosurkarimun.jpeg',
            'price' => 1500000,
            'duration_days' => 3,
            'duration_nights' => 2,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Karimunjawa Paradise',
                    'description' => 'Surga tersembunyi di Jawa Tengah dengan pantai pasir putih dan snorkeling',
                    'itinerary' => "Hari 1:\n- 07:00 Keberangkatan dari Pelabuhan Kartini Jepara\n- 09:00 Tiba di Karimunjawa\n- 10:00 Check-in homestay\n- 11:00 Island hopping: Pulau Menjangan Kecil\n- 13:00 Lunch di kapal\n- 14:00 Snorkeling di spot terbaik\n- 17:00 Sunset di pantai\n- 19:00 Dinner\n\nHari 2:\n- 07:00 Breakfast\n- 08:00 Pulau Cemara Kecil\n- 10:00 Snorkeling dan berenang\n- 12:00 Lunch\n- 14:00 Pulau Tengah\n- 17:00 Kembali ke homestay\n- 19:00 Dinner\n\nHari 3:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Wisata Hutan Mangrove\n- 11:00 Menuju pelabuhan\n- 12:00 Keberangkatan ke Jepara",
                    'terms_conditions' => 'Harga sudah termasuk kapal PP, homestay 2 malam, makan 7x, boat island hopping, alat snorkeling, dan tour guide. Belum termasuk dokumentasi underwater.'
                ],
                'en' => [
                    'title' => 'Karimunjawa Paradise',
                    'description' => 'Hidden paradise in Central Java with white sand beaches and snorkeling',
                    'itinerary' => "Day 1:\n- 07:00 Departure from Kartini Port Jepara\n- 09:00 Arrive at Karimunjawa\n- 10:00 Homestay check-in\n- 11:00 Island hopping: Menjangan Kecil Island\n- 13:00 Lunch on boat\n- 14:00 Snorkeling at best spots\n- 17:00 Sunset at beach\n- 19:00 Dinner\n\nDay 2:\n- 07:00 Breakfast\n- 08:00 Cemara Kecil Island\n- 10:00 Snorkeling and swimming\n- 12:00 Lunch\n- 14:00 Pulau Tengah\n- 17:00 Return to homestay\n- 19:00 Dinner\n\nDay 3:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Mangrove Forest tour\n- 11:00 Head to port\n- 12:00 Departure to Jepara",
                    'terms_conditions' => 'Price includes round trip ferry, 2 nights homestay, 7x meals, island hopping boat, snorkeling equipment, and tour guide. Does not include underwater photography.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5] // hotel, transport, tour-guide, meals, entrance-ticket
        ]);

        $this->createPackage($domestic->id, [
            'slug' => 'magelang-tour',
            'thumbnail' => 'image/brosurmagelang.jpeg',
            'price' => 600000,
            'duration_days' => 2,
            'duration_nights' => 1,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Wisata Magelang',
                    'description' => 'Kunjungi Borobudur dan sekitarnya dengan pemanduan lengkap',
                    'itinerary' => "Hari 1:\n- 06:00 Keberangkatan dari meeting point\n- 08:00 Tiba di Borobudur, menikmati sunrise\n- 10:00 Tour Candi Borobudur dengan guide\n- 12:00 Lunch di restoran\n- 14:00 Candi Mendut dan Pawon\n- 16:00 Gereja Ayam (Bukit Rhema)\n- 18:00 Check-in hotel\n- 19:00 Dinner\n\nHari 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Punthuk Setumbu\n- 11:00 Ketep Pass (view Merapi & Merbabu)\n- 13:00 Lunch\n- 15:00 Kembali ke meeting point",
                    'terms_conditions' => 'Harga sudah termasuk transportasi AC, hotel, makan 4x, tiket masuk Borobudur, dan tour guide profesional. Belum termasuk tiket wisata lainnya.'
                ],
                'en' => [
                    'title' => 'Magelang Tour',
                    'description' => 'Visit Borobudur and surroundings with complete guidance',
                    'itinerary' => "Day 1:\n- 06:00 Departure from meeting point\n- 08:00 Arrive at Borobudur, enjoy sunrise\n- 10:00 Borobudur Temple tour with guide\n- 12:00 Lunch at restaurant\n- 14:00 Mendut and Pawon Temples\n- 16:00 Chicken Church (Bukit Rhema)\n- 18:00 Hotel check-in\n- 19:00 Dinner\n\nDay 2:\n- 07:00 Breakfast\n- 08:00 Check-out\n- 09:00 Punthuk Setumbu\n- 11:00 Ketep Pass (view Merapi & Merbabu)\n- 13:00 Lunch\n- 15:00 Return to meeting point",
                    'terms_conditions' => 'Price includes AC transportation, hotel, 4x meals, Borobudur entrance ticket, and professional tour guide. Does not include other attraction tickets.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5] // hotel, transport, tour-guide, meals, entrance-ticket
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
                'id' => [
                    'title' => 'Korea Musim Dingin',
                    'description' => 'Nikmati salju Korea Selatan dengan skiing dan wisata kota Seoul',
                    'itinerary' => "Hari 1:\n- Penerbangan ke Seoul (Incheon Airport)\n- Tiba di Seoul, transfer ke hotel\n- Check-in hotel\n- Dinner di restoran Korea\n\nHari 2:\n- Breakfast di hotel\n- Gyeongbokgung Palace\n- Bukchon Hanok Village\n- Lunch\n- N Seoul Tower\n- Myeongdong shopping\n- Dinner\n\nHari 3:\n- Breakfast di hotel\n- Nami Island (full day tour)\n- Petite France\n- Lunch\n- Garden of Morning Calm\n- Dinner\n\nHari 4:\n- Breakfast di hotel\n- Everland Theme Park atau ski resort\n- Lunch\n- Shopping di Dongdaemun\n- Dinner\n\nHari 5:\n- Breakfast di hotel\n- Check-out\n- Last minute shopping\n- Transfer ke airport\n- Penerbangan kembali",
                    'terms_conditions' => 'Harga sudah termasuk tiket pesawat PP, hotel bintang 4, tour guide berbahasa Indonesia, makan sesuai itinerary, transportasi, dan asuransi perjalanan. Belum termasuk visa Korea (jika diperlukan) dan pengeluaran pribadi.'
                ],
                'en' => [
                    'title' => 'Korea Winter Tour',
                    'description' => 'Enjoy snow in South Korea with skiing and Seoul city tour',
                    'itinerary' => "Day 1:\n- Flight to Seoul (Incheon Airport)\n- Arrive in Seoul, transfer to hotel\n- Hotel check-in\n- Dinner at Korean restaurant\n\nDay 2:\n- Breakfast at hotel\n- Gyeongbokgung Palace\n- Bukchon Hanok Village\n- Lunch\n- N Seoul Tower\n- Myeongdong shopping\n- Dinner\n\nDay 3:\n- Breakfast at hotel\n- Nami Island (full day tour)\n- Petite France\n- Lunch\n- Garden of Morning Calm\n- Dinner\n\nDay 4:\n- Breakfast at hotel\n- Everland Theme Park or ski resort\n- Lunch\n- Shopping at Dongdaemun\n- Dinner\n\nDay 5:\n- Breakfast at hotel\n- Check-out\n- Last minute shopping\n- Transfer to airport\n- Return flight",
                    'terms_conditions' => 'Price includes round trip flight tickets, 4-star hotel, Indonesian-speaking tour guide, meals as per itinerary, transportation, and travel insurance. Does not include Korea visa (if required) and personal expenses.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6] // hotel, transport, tour-guide, meals, entrance-ticket, insurance
        ]);

        $this->createPackage($international->id, [
            'slug' => 'japan-sakura',
            'thumbnail' => 'image/brosurjepang.jpeg',
            'price' => 20000000,
            'duration_days' => 6,
            'duration_nights' => 5,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Jepang Musim Sakura',
                    'description' => 'Saksikan keindahan bunga sakura di Tokyo dan Kyoto',
                    'itinerary' => "Hari 1:\n- Penerbangan ke Tokyo (Narita/Haneda)\n- Tiba di Tokyo, transfer ke hotel\n- Check-in hotel\n- Dinner\n\nHari 2:\n- Breakfast\n- Tokyo Tower\n- Senso-ji Temple Asakusa\n- Nakamise Shopping Street\n- Lunch\n- Akihabara Electric Town\n- Shibuya Crossing\n- Dinner\n\nHari 3:\n- Breakfast\n- Mt. Fuji 5th Station\n- Lake Kawaguchiko\n- Lunch\n- Oshino Hakkai\n- Kembali ke Tokyo\n- Dinner\n\nHari 4:\n- Breakfast, check-out\n- Shinkansen ke Kyoto\n- Check-in hotel Kyoto\n- Fushimi Inari Shrine\n- Lunch\n- Arashiyama Bamboo Grove\n- Dinner\n\nHari 5:\n- Breakfast\n- Kinkaku-ji (Golden Pavilion)\n- Kiyomizu-dera Temple\n- Lunch\n- Gion District\n- Shopping di Nishiki Market\n- Dinner\n\nHari 6:\n- Breakfast, check-out\n- Transfer ke Kansai Airport\n- Last shopping\n- Penerbangan kembali",
                    'terms_conditions' => 'Harga sudah termasuk tiket pesawat PP, hotel bintang 4, JR Pass 7 hari, tour guide berbahasa Indonesia, makan sesuai itinerary, dan asuransi perjalanan. Belum termasuk visa Jepang dan pengeluaran pribadi.'
                ],
                'en' => [
                    'title' => 'Japan Sakura Season',
                    'description' => 'Witness the beauty of cherry blossoms in Tokyo and Kyoto',
                    'itinerary' => "Day 1:\n- Flight to Tokyo (Narita/Haneda)\n- Arrive in Tokyo, transfer to hotel\n- Hotel check-in\n- Dinner\n\nDay 2:\n- Breakfast\n- Tokyo Tower\n- Senso-ji Temple Asakusa\n- Nakamise Shopping Street\n- Lunch\n- Akihabara Electric Town\n- Shibuya Crossing\n- Dinner\n\nDay 3:\n- Breakfast\n- Mt. Fuji 5th Station\n- Lake Kawaguchiko\n- Lunch\n- Oshino Hakkai\n- Return to Tokyo\n- Dinner\n\nDay 4:\n- Breakfast, check-out\n- Shinkansen to Kyoto\n- Kyoto hotel check-in\n- Fushimi Inari Shrine\n- Lunch\n- Arashiyama Bamboo Grove\n- Dinner\n\nDay 5:\n- Breakfast\n- Kinkaku-ji (Golden Pavilion)\n- Kiyomizu-dera Temple\n- Lunch\n- Gion District\n- Shopping at Nishiki Market\n- Dinner\n\nDay 6:\n- Breakfast, check-out\n- Transfer to Kansai Airport\n- Last shopping\n- Return flight",
                    'terms_conditions' => 'Price includes round trip flight tickets, 4-star hotel, 7-day JR Pass, Indonesian-speaking tour guide, meals as per itinerary, and travel insurance. Does not include Japan visa and personal expenses.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6] // hotel, transport, tour-guide, meals, entrance-ticket, insurance
        ]);

        $this->createPackage($international->id, [
            'slug' => 'china-heritage',
            'thumbnail' => 'image/brosurchina.jpeg',
            'price' => 18000000,
            'duration_days' => 7,
            'duration_nights' => 6,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Warisan Budaya China',
                    'description' => 'Jelajahi sejarah dan budaya China dari Beijing hingga Shanghai',
                    'itinerary' => "Hari 1:\n- Penerbangan ke Beijing\n- Tiba di Beijing, transfer ke hotel\n- Check-in hotel\n- Dinner\n\nHari 2:\n- Breakfast\n- Tiananmen Square\n- Forbidden City\n- Lunch\n- Temple of Heaven\n- Dinner Peking Duck\n\nHari 3:\n- Breakfast\n- Great Wall of China (Mutianyu)\n- Lunch\n- Summer Palace\n- Dinner\n\nHari 4:\n- Breakfast, check-out\n- Penerbangan Beijing - Shanghai\n- Check-in hotel Shanghai\n- The Bund\n- Nanjing Road\n- Dinner\n\nHari 5:\n- Breakfast\n- Yu Garden\n- Shanghai Museum\n- Lunch\n- Oriental Pearl Tower\n- Xintiandi\n- Acrobatic Show\n- Dinner\n\nHari 6:\n- Breakfast\n- Zhujiajiao Water Town (full day)\n- Lunch\n- Shopping di fake market\n- Dinner\n\nHari 7:\n- Breakfast, check-out\n- Last shopping\n- Transfer ke airport\n- Penerbangan kembali",
                    'terms_conditions' => 'Harga sudah termasuk tiket pesawat PP internasional dan domestik, hotel bintang 4, tour guide berbahasa Indonesia, makan sesuai itinerary, transportasi, tiket masuk objek wisata, dan asuransi. Belum termasuk visa China dan pengeluaran pribadi.'
                ],
                'en' => [
                    'title' => 'China Heritage Tour',
                    'description' => 'Explore China history and culture from Beijing to Shanghai',
                    'itinerary' => "Day 1:\n- Flight to Beijing\n- Arrive in Beijing, transfer to hotel\n- Hotel check-in\n- Dinner\n\nDay 2:\n- Breakfast\n- Tiananmen Square\n- Forbidden City\n- Lunch\n- Temple of Heaven\n- Peking Duck Dinner\n\nDay 3:\n- Breakfast\n- Great Wall of China (Mutianyu)\n- Lunch\n- Summer Palace\n- Dinner\n\nDay 4:\n- Breakfast, check-out\n- Flight Beijing - Shanghai\n- Shanghai hotel check-in\n- The Bund\n- Nanjing Road\n- Dinner\n\nDay 5:\n- Breakfast\n- Yu Garden\n- Shanghai Museum\n- Lunch\n- Oriental Pearl Tower\n- Xintiandi\n- Acrobatic Show\n- Dinner\n\nDay 6:\n- Breakfast\n- Zhujiajiao Water Town (full day)\n- Lunch\n- Shopping at fake market\n- Dinner\n\nDay 7:\n- Breakfast, check-out\n- Last shopping\n- Transfer to airport\n- Return flight",
                    'terms_conditions' => 'Price includes round trip international and domestic flight tickets, 4-star hotel, Indonesian-speaking tour guide, meals as per itinerary, transportation, entrance tickets, and insurance. Does not include China visa and personal expenses.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6] // hotel, transport, tour-guide, meals, entrance-ticket, insurance
        ]);

        $this->createPackage($international->id, [
            'slug' => 'vietnam-adventure',
            'thumbnail' => 'image/brosurvietnam.jpeg',
            'price' => 12000000,
            'duration_days' => 5,
            'duration_nights' => 4,
            'is_featured' => true,
            'translations' => [
                'id' => [
                    'title' => 'Petualangan Vietnam',
                    'description' => 'Eksplorasi keindahan Vietnam dari Hanoi hingga Ha Long Bay',
                    'itinerary' => "Hari 1:\n- Penerbangan ke Hanoi\n- Tiba di Hanoi, transfer ke hotel\n- Check-in hotel\n- Jalan-jalan Old Quarter\n- Dinner\n\nHari 2:\n- Breakfast\n- Ho Chi Minh Mausoleum\n- One Pillar Pagoda\n- Temple of Literature\n- Lunch\n- Hoan Kiem Lake\n- Water Puppet Show\n- Dinner\n\nHari 3:\n- Breakfast, check-out\n- Transfer ke Ha Long Bay (3-4 jam)\n- Cruise check-in\n- Lunch di kapal\n- Island hopping & kayaking\n- Sunset di kapal\n- Dinner seafood\n- Bermalam di kapal\n\nHari 4:\n- Breakfast di kapal\n- Tai Chi session\n- Sung Sot Cave\n- Brunch di kapal\n- Check-out cruise\n- Kembali ke Hanoi\n- Check-in hotel\n- Dinner\n\nHari 5:\n- Breakfast, check-out\n- Shopping di Dong Xuan Market\n- Lunch\n- Transfer ke airport\n- Penerbangan kembali",
                    'terms_conditions' => 'Harga sudah termasuk tiket pesawat PP, hotel bintang 3-4, Ha Long Bay cruise (1 malam di kapal), tour guide berbahasa Indonesia, makan sesuai itinerary, transportasi, dan asuransi. Belum termasuk visa Vietnam dan pengeluaran pribadi.'
                ],
                'en' => [
                    'title' => 'Vietnam Adventure',
                    'description' => 'Explore the beauty of Vietnam from Hanoi to Ha Long Bay',
                    'itinerary' => "Day 1:\n- Flight to Hanoi\n- Arrive in Hanoi, transfer to hotel\n- Hotel check-in\n- Walk around Old Quarter\n- Dinner\n\nDay 2:\n- Breakfast\n- Ho Chi Minh Mausoleum\n- One Pillar Pagoda\n- Temple of Literature\n- Lunch\n- Hoan Kiem Lake\n- Water Puppet Show\n- Dinner\n\nDay 3:\n- Breakfast, check-out\n- Transfer to Ha Long Bay (3-4 hours)\n- Cruise check-in\n- Lunch on boat\n- Island hopping & kayaking\n- Sunset on boat\n- Seafood dinner\n- Overnight on boat\n\nDay 4:\n- Breakfast on boat\n- Tai Chi session\n- Sung Sot Cave\n- Brunch on boat\n- Cruise check-out\n- Return to Hanoi\n- Hotel check-in\n- Dinner\n\nDay 5:\n- Breakfast, check-out\n- Shopping at Dong Xuan Market\n- Lunch\n- Transfer to airport\n- Return flight",
                    'terms_conditions' => 'Price includes round trip flight tickets, 3-4 star hotel, Ha Long Bay cruise (1 night on boat), Indonesian-speaking tour guide, meals as per itinerary, transportation, and insurance. Does not include Vietnam visa and personal expenses.'
                ],
            ],
            'services' => [1, 2, 3, 4, 5, 6] // hotel, transport, tour-guide, meals, entrance-ticket, insurance
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
                'itinerary' => $translation['itinerary'] ?? null,
                'terms_conditions' => $translation['terms_conditions'] ?? null,
            ]);
        }

        // Attach services if provided
        if (isset($data['services']) && is_array($data['services'])) {
            $package->services()->attach($data['services']);
        }
    }
}
