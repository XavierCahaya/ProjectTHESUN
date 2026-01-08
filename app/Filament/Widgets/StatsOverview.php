<?php

namespace App\Filament\Widgets;

use App\Models\Package;
use App\Models\Category;
use App\Models\Service;
use App\Models\HeroSlider;
use App\Models\GalleryImage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 0;

    protected int|string|array $columnSpan = 'full';

    protected static bool $isDiscovered = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Paket Wisata', Package::count())
                ->description('Jumlah paket wisata')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah kategori')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),

            Stat::make('Total Layanan', Service::count())
                ->description('Jumlah layanan')
                ->descriptionIcon('heroicon-m-star')
                ->color('info'),

            Stat::make('Total Galeri', GalleryImage::count())
                ->description('Jumlah gambar galeri')
                ->descriptionIcon('heroicon-m-photo')
                ->color('primary'),
        ];
    }
}
