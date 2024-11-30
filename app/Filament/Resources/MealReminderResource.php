<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MealReminderResource\Pages;
use App\Filament\Resources\MealReminderResource\RelationManagers;
use App\Models\MealReminder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MealReminderResource extends Resource
{
    protected static ?string $model = MealReminder::class;

    protected static ?string $navigationIcon = 'heroicon-c-cake';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('meal_name')
                    ->maxLength(255),
                Forms\Components\TimePicker::make('meal_time')
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
                    ->sortable(),
                Tables\Columns\TextColumn::make('meal_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('meal_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('repeat')
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
            'index' => Pages\ListMealReminders::route('/'),
            'create' => Pages\CreateMealReminder::route('/create'),
            'edit' => Pages\EditMealReminder::route('/{record}/edit'),
        ];
    }
}
