<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthCheckupReminderResource\Pages;
use App\Filament\Resources\HealthCheckupReminderResource\RelationManagers;
use App\Models\HealthCheckupReminder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HealthCheckupReminderResource extends Resource
{
    protected static ?string $model = HealthCheckupReminder::class;

    protected static ?string $navigationIcon = 'heroicon-m-shield-check';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('checkup_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('next_checkup_date')
                    ->required()
                    ->seconds(false),
                Forms\Components\Toggle::make('is_reminded')
                    ->label('Reminded')
                    ->inline(false)
                    ->default(false)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('checkup_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('next_checkup_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_reminded')
                    ->label('Reminded')
                    ->boolean()
                    ->trueColor('info')
                    ->falseColor('warning')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHealthCheckupReminders::route('/'),
            'create' => Pages\CreateHealthCheckupReminder::route('/create'),
            'edit' => Pages\EditHealthCheckupReminder::route('/{record}/edit'),
        ];
    }
}
