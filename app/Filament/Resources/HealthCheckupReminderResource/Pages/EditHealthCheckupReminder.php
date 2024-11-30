<?php

namespace App\Filament\Resources\HealthCheckupReminderResource\Pages;

use App\Filament\Resources\HealthCheckupReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHealthCheckupReminder extends EditRecord
{
    protected static string $resource = HealthCheckupReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
