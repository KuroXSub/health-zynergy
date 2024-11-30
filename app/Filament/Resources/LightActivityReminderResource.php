<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LightActivityReminderResource\Pages;
use App\Filament\Resources\LightActivityReminderResource\RelationManagers;
use App\Models\LightActivityReminder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LightActivityReminderResource extends Resource
{
    protected static ?string $model = LightActivityReminder::class;

    protected static ?string $navigationIcon = 'heroicon-s-face-smile';
    protected static ?string $navigationGroup = 'Reminders';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('activity_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TimePicker::make('activity_time')
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
                    ->label('Deleter After')
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
                Tables\Columns\TextColumn::make('activity_name'),
                Tables\Columns\TextColumn::make('activity_time'),
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
            'index' => Pages\ListLightActivityReminders::route('/'),
            'create' => Pages\CreateLightActivityReminder::route('/create'),
            'edit' => Pages\EditLightActivityReminder::route('/{record}/edit'),
        ];
    }
}
