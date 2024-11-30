<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Doctrine\DBAL\Query\Limit;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TableWidget extends BaseWidget
{
    protected static ?string $heading = 'Latest Users';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::where('role', 'User')
                ->orderBy('created_at', 'desc')
                ->limit(3)
            )
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email')
            ]);
    }
}
