<?php

namespace App\Filament\Resources\UserPersonalizationResource\Pages;

use App\Filament\Resources\UserPersonalizationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserPersonalization extends CreateRecord
{
    protected static string $resource = UserPersonalizationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
