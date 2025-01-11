<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        $income = Transaction::incomes()
                    ->whereBetween('date_transaction', [$startDate, $endDate])
                    ->sum('amount');

        $expense = Transaction::expenses()
                    ->whereBetween('date_transaction', [$startDate, $endDate])
                    ->sum('amount');

        return [
            Stat::make('Total Income', 'Rp.'.' '.$income),
            Stat::make('Total Expense', 'Rp.'.' '.$expense),
            Stat::make('Gap','Rp.'.' '.$income - $expense),
        ];
    }
}
