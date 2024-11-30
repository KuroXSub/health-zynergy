<?php

namespace App\Filament\Resources\UserPersonalizationResource\Pages;

use App\Filament\Resources\UserPersonalizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPersonalization extends EditRecord
{
    protected static string $resource = UserPersonalizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
