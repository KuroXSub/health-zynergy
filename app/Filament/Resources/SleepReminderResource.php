<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SleepReminderResource\Pages;
use App\Filament\Resources\SleepReminderResource\RelationManagers;
use App\Models\SleepReminder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SleepReminderResource extends Resource
{
    protected static ?string $model = SleepReminder::class;

    protected static ?string $navigationIcon = 'heroicon-c-bell-snooze';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('sleep_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TimePicker::make('bedtime')
                    ->required()
                    ->seconds(false),
                Forms\Components\TimePicker::make('wake_up_time')
                    ->required()
                    ->seconds(false),
                Forms\Components\Select::make('repeat')
                    ->options([
                        'Sekali' => 'Sekali',
                        'Harian' => 'Harian',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('vibrate_after')
                    ->label('Vibrate After')
                    ->inline(false)
                    ->default(false)
                    ->required(),
                Forms\Components\Toggle::make('delete_after')
                    ->label('Delete After')
                    ->inline(false)
                    ->default(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('sleep_name'),
                Tables\Columns\TextColumn::make('bedtime'),
                Tables\Columns\TextColumn::make('wake_up_time'),
                Tables\Columns\TextColumn::make('repeat')
                    ->sortable(),
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
            'index' => Pages\ListSleepReminders::route('/'),
            'create' => Pages\CreateSleepReminder::route('/create'),
            'edit' => Pages\EditSleepReminder::route('/{record}/edit'),
        ];
    }
}
