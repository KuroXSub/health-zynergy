<?php

namespace App\Filament\Resources\ArticleResource\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Articles', Article::count())
                ->description('All articles')
                ->icon('heroicon-o-document'),
    
            Stat::make('Draft Articles', Article::where('status', 'draft')->count())
                ->description('Articles in draft status')
                ->color('warning')
                ->icon('heroicon-o-pencil-square'),
    
            Stat::make('Published Articles', Article::where('status', 'publish')->count())
                ->description('Articles published')
                ->color('success')
                ->icon('heroicon-o-document-check'),
        ];
    }
}
