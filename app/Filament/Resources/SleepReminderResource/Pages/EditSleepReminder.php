<?php

namespace App\Filament\Resources\SleepReminderResource\Pages;

use App\Filament\Resources\SleepReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSleepReminder extends EditRecord
{
    protected static string $resource = SleepReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
