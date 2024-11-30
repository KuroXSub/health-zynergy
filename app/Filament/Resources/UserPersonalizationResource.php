<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserPersonalizationResource\Pages;
use App\Filament\Resources\UserPersonalizationResource\RelationManagers;
use App\Models\UserPersonalization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserPersonalizationResource extends Resource
{
    protected static ?string $model = UserPersonalization::class;

    protected static ?string $navigationIcon = 'heroicon-m-clipboard-document-list';
    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name'),
                Forms\Components\Select::make('disease_ids')
                    ->multiple()
                    ->relationship('diseases', 'disease'),
                Forms\Components\Select::make('interest_ids')
                    ->multiple()
                    ->relationship('interests', 'interest'),
                Forms\Components\Select::make('allergy_ids')  
                    ->multiple()
                    ->relationship('allergies', 'allergy'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diseases.id')
                    ->label('Diseases')
                    ->formatStateUsing(function ($record) {
                        return $record->diseases->pluck('disease')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('interests.id')
                    ->label('Interests')
                    ->formatStateUsing(function ($record) {
                        return $record->interests->pluck('interest')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('allergies.id')
                    ->label('Allergy')
                    ->formatStateUsing(function ($record) {
                        return $record->allergies->pluck('allergy')->join(', ');
                    }),
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
            'index' => Pages\ListUserPersonalizations::route('/'),
            'create' => Pages\CreateUserPersonalization::route('/create'),
            'edit' => Pages\EditUserPersonalization::route('/{record}/edit'),
        ];
    }
}
