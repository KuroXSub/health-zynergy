<?php

namespace App\Filament\Resources\AllergyResource\Pages;

use App\Filament\Resources\AllergyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAllergy extends EditRecord
{
    protected static string $resource = AllergyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
