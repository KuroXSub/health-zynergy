<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Registered users')
                ->chart(User::query()
                    ->latest()
                    ->take(7)
                    ->pluck('id')
                    ->toArray())
                ->color($this->getColorBasedOnTrend(User::class))
                ->icon('heroicon-o-users'),

            Stat::make('Total Admin', User::where('role', 'Admin')->count())
                ->description('Admin')
                ->color('success')
                ->icon('heroicon-o-pencil-square'),

            Stat::make('Total User', User::where('role', 'User')->count())
                ->description('User')
                ->color('success')
                ->icon('heroicon-o-pencil-square'),
        ];
    }

    protected function getColorBasedOnTrend($modelClass): string
    {
        $today = $modelClass::whereDate('created_at', today())->count();
        $yesterday = $modelClass::whereDate('created_at', today()->subDay())->count();

        if ($today > $yesterday) {
            return 'success';
        } elseif ($today < $yesterday) {
            return 'danger';
        }
        return 'warning';
    }

}
