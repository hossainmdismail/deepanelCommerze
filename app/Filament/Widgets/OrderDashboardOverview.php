<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderDashboardOverview extends ChartWidget
{
    protected static ?string $heading = 'Monthly Report';

    protected static ?string $placement = 'dashboard'; // optional, defaults to dashboard

    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return true;
    }

    protected function getData(): array
    {
        $months = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [Carbon::create()->month($month)->format('M') => 0];
        });

        // Get actual sales
        $sales = Order::selectRaw('DATE_FORMAT(created_at, "%b") as month, SUM(total_amount) as total')
            ->where('created_at', '>=', now()->startOfYear())
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%b")'))
            ->pluck('total', 'month');

        // Merge real data with zeroes for missing months
        $final = $months->merge($sales)->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Monthly Sales',
                    'data' => array_values($final),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => array_keys($final),
        ];
    }



    protected function getType(): string
    {
        return 'line';
    }
}
