<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class ProjectChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Project Status Distribution';

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
        $ongoingCount = Project::where('status', 'ongoing')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $completedCount = Project::where('status', 'completed')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count();

        $onholdCount = Project::where('status', 'onhold')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->count(); 

        return [
            'datasets' => [
                [
                    'label' => 'Project Status',
                    'data' => [
                        $ongoingCount,
                        $completedCount,
                        $onholdCount,
                    ],
                    'backgroundColor' => [
                        '#FFCE56',
                        '#4CAF50',
                        '#FF6384',
                    ],
                ],
            ],
            'labels' => ['Ongoing', 'Completed', 'Onhold'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
