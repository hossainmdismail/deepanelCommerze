<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class DashboardWeeklyChart extends ChartWidget
{
    protected static ?string $heading = 'Weekly Report';

        protected static ?string $placement = 'dashboard'; // optional, defaults to dashboard

    protected static ?int $sort = 2;

    public static function canView(): bool
    {
        return true;
    }

    protected function getData(): array
    {
        $statuses = ['pending', 'complete'];
        $days = collect(range(0, 6))->map(function ($i) {
            return Carbon::now()->subDays(6 - $i)->format('Y-m-d');
        });

        // Base array: ['2025-07-08' => 0, ..., '2025-07-14' => 0]
        $base = $days->mapWithKeys(fn($date) => [$date => 0]);

        $datasets = [];

        foreach ($statuses as $status) {
            // Get counts per day for this status
            $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->where('created_at', '>=', now()->subDays(6)->startOfDay())
                ->where('status', $status)
                ->groupBy(DB::raw('DATE(created_at)'))
                ->pluck('total', 'date');

            // Merge real data with zero-filled days
            $fullData = $base->merge($data)->sortKeys()->values()->toArray();

            $datasets[] = [
                'label' => ucfirst($status),
                'data' => $fullData,
                'backgroundColor' => $status === 'pending' ? '#facc15' : '#4ade80',
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => $days->map(fn($d) => Carbon::parse($d)->format('D'))->toArray(), // ['Mon', 'Tue', ...]
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
