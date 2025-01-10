<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $income = Transaction::incomes()->get()->sum('amount');

        $expense = Transaction::expenses()->get()->sum('amount');

        return [
            Stat::make('Total Income', $income),
            Stat::make('Total Expense', $expense),
            Stat::make('Gap', $income - $expense),
        ];
    }
}
