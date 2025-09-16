<?php

namespace App\Filament\Widgets;

use App\Models\Font;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Fonts', Font::count())
                ->description('Total fonts in the system')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),
                
            Stat::make('Total Downloads', Font::sum('downloads_count'))
                ->description('Total font downloads')
                ->descriptionIcon('heroicon-m-arrow-down-tray')
                ->color('info'),
                
            Stat::make('Total Earnings', '৳ ' . number_format(Order::where('status', 'completed')->sum('amount'), 2))
                ->description('From completed orders')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
            Stat::make("Total Orders", Order::count())
                ->description('Total orders')
                ->descriptionIcon('heroicon-m-arrow-down-tray')
                ->color('info'),
        ];
    }
}
