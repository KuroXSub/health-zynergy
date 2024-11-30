<?php

namespace App\Filament\Resources\MealReminderResource\Pages;

use App\Filament\Resources\MealReminderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMealReminder extends EditRecord
{
    protected static string $resource = MealReminderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
