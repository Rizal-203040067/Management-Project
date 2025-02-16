<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class OrderChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Order Status Distribution';

    protected static string $color = 'info';

    protected static ?int $sort = 4;

    public static function canView(): bool
    {
        return Auth::user() && Auth::user()->hasRole(['super', 'manager']);
    }

    protected function getData(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate'])->endOfDay() :
            now()->endOfDay();

        // Get counts for each status
        $pendingCount = Order::where('status', 'pending')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $completedCount = Order::where('status', 'completed')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $cancelledCount = Order::where('status', 'cancelled')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count(); 

        return [
            'datasets' => [
                [
                    'label' => 'Order Status',
                    'data' => [
                        $pendingCount,
                        $completedCount,
                        $cancelledCount,
                    ],
                    'backgroundColor' => [
                        '#FFCE56',
                        '#4CAF50',
                        '#FF6384',
                    ],
                ],
            ],
            'labels' => ['Pending', 'Completed', 'Cancelled'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
