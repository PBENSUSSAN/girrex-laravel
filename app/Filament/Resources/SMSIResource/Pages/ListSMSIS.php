<?php

namespace App\Filament\Resources\SMSIResource\Pages;

use App\Filament\Resources\SMSIResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSMSIS extends ListRecords
{
    protected static string $resource = SMSIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
