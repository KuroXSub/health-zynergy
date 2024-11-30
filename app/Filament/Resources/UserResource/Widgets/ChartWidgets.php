<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChartWidgets extends ChartWidget
{
    protected static ?string $heading = 'User Chart (Last 7 Days)';

    protected function getData(): array
    {
        $lastWeek = Carbon::now()->subDays(7);

        $usersByDay = User::where('created_at', '>=', $lastWeek)
            ->select(DB::raw('DATE(created_at) as created_at'), DB::raw('COUNT(*) as count'))
            ->groupBy('created_at')
            ->get()
            ->pluck('count', 'created_at')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'New Users per Day',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => array_values($usersByDay),
                ],
            ],
            'labels' => array_keys($usersByDay),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
