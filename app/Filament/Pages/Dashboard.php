<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets;

class Dashboard extends BaseDashboard
{
    public function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\CompanyInfoWidget::class,
            Widgets\AccountWidget::class,
        ];

    }

    public function getFooterWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverview::class,
        ];
    }

    public function getColumns(): int|string|array
    {
        return 4;
    }
}

