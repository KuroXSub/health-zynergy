<?php

namespace App\Filament\Resources\InterestResource\Pages;

use App\Filament\Resources\InterestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInterest extends CreateRecord
{
    protected static string $resource = InterestResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
