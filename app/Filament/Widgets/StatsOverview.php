<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected static ?string $placement = 'dashboard';

    protected static ?int $sort = 1;

    public static function canView(): bool
    {
        return true;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Pending Orders', Order::where('status', 'pending')->count())
                ->description('Total Order is ' . Order::count())
                ->descriptionIcon('heroicon-o-map', IconPosition::Before)
                ->color('success'),
            Stat::make('This month sales', number_format(Order::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth(),])->sum('total_amount')) . ' Tk')
                ->description('Total sales ' . number_format(Order::sum('total_amount')) . ' TK')
                ->descriptionIcon('heroicon-o-currency-dollar', IconPosition::Before)
                ->color('success'),
            Stat::make('Todays Sales', Order::where('created_at', Carbon::now())->sum('total_amount'))
                ->description('This will show only Todays sales')
                ->color('success'),
        ];
    }
}
