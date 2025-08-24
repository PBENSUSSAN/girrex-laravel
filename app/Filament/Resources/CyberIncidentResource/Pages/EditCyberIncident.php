<?php

namespace App\Filament\Resources\CyberIncidentResource\Pages;

use App\Filament\Resources\CyberIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCyberIncident extends EditRecord
{
    protected static string $resource = CyberIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
