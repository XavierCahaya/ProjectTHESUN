<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['slug' => 'hotel', 'icon' => 'heroicon-o-home'],
            ['slug' => 'transport', 'icon' => 'heroicon-o-truck'],
            ['slug' => 'tour-guide', 'icon' => 'heroicon-o-user-group'],
            ['slug' => 'meals', 'icon' => 'heroicon-o-cake'],
            ['slug' => 'entrance-ticket', 'icon' => 'heroicon-o-ticket'],
            ['slug' => 'insurance', 'icon' => 'heroicon-o-shield-check'],
        ];

        foreach ($services as $serviceData) {
            $service = Service::create([
                'slug' => $serviceData['slug'],
                'icon' => $serviceData['icon'],
                'is_active' => true,
            ]);

            // Indonesian translation
            ServiceTranslation::create([
                'service_id' => $service->id,
                'locale' => 'id',
                'name' => $this->getIndonesianName($serviceData['slug']),
            ]);

            // English translation
            ServiceTranslation::create([
                'service_id' => $service->id,
                'locale' => 'en',
                'name' => $this->getEnglishName($serviceData['slug']),
            ]);
        }
    }

    private function getIndonesianName($slug)
    {
        $names = [
            'hotel' => 'Hotel',
            'transport' => 'Transportasi',
            'tour-guide' => 'Pemandu Wisata',
            'meals' => 'Makan',
            'entrance-ticket' => 'Tiket Masuk',
            'insurance' => 'Asuransi',
        ];

        return $names[$slug] ?? ucfirst(str_replace('-', ' ', $slug));
    }

    private function getEnglishName($slug)
    {
        $names = [
            'hotel' => 'Hotel',
            'transport' => 'Transportation',
            'tour-guide' => 'Tour Guide',
            'meals' => 'Meals',
            'entrance-ticket' => 'Entrance Ticket',
            'insurance' => 'Insurance',
        ];

        return $names[$slug] ?? ucfirst(str_replace('-', ' ', $slug));
    }
}
