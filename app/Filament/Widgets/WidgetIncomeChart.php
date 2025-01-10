<?php

namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use App\Models\Transaction;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class WidgetIncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Income';

    protected static string $color = 'success';


    protected function getData(): array
    {
        $data = Trend::query(Transaction::incomes())
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
    
        return [
            'datasets' => [
                [
                    'label' => 'Incomes By Day',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
