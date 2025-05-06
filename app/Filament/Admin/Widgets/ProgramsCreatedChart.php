<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Program;
use Carbon\Carbon;
use Filament\Widgets\LineChartWidget;

class ProgramsCreatedChart extends LineChartWidget
{
    protected static ?string $heading = 'Новые программы за 7 дней';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        // последние 7 дней
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::now()->subDays($i)->format('d.m');

            $count = Program::whereDate('created_at', $date)->count();
            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Программы',
                    'data' => $data,
                    'borderColor' => '#3b82f6', // синий
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
