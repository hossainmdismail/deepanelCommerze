<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Filament\Resources\OrderResource\Pages\ListOrders;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderOverview extends BaseWidget
{
    protected function getTablePage():string{
        return ListOrders::class;
    }
    protected function getStats(): array
    {
        return [
            Card::make('Total Orders', Order::count()),

            Card::make('Open Orders', Order::whereNotIn('status', ['delivered', 'cancelled'])->count()),

            Card::make('Average Price', number_format(Order::avg('total_amount'), 2)),
        ];
    }
}
