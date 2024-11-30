<?php

namespace App\Filament\Resources\LightActivityReminderResource\Pages;

use App\Filament\Resources\LightActivityReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLightActivityReminder extends EditRecord
{
    protected static string $resource = LightActivityReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
