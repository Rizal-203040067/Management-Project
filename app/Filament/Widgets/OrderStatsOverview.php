<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Project;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class OrderStatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    // protected ?string $heading = 'Order';

    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate'])->endOfDay() :
            now()->endOfDay();

        $customer = Customer::whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $order = Order::whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $project = Project::whereBetween('created_at', [$startDate, $endDate])
                    ->count();


        return [
            Stat::make('Total Customers', $customer),
            Stat::make('Total Orders', $order),
            Stat::make('Total Projects', $project),
        ];
    }
}
