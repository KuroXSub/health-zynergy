<?php

namespace App\Filament\Resources\DiseaseResource\Widgets;

use App\Models\Allergy;
use App\Models\Disease;
use App\Models\Interest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Interests', Interest::count())
            ->description('All interests')
            ->icon('heroicon-o-sparkles'),

        Stat::make('Total Diseases', Disease::count())
            ->description('All diseases')
            ->icon('heroicon-o-x-circle'),

        Stat::make('Total Allergy', Allergy::count())
            ->description('All allergies')
            ->icon('heroicon-o-stop-circle'),
        ];
    }
}
