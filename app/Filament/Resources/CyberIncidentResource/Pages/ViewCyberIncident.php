<?php

namespace App\Filament\Resources\CyberIncidentResource\Pages;

use App\Filament\Resources\CyberIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCyberIncident extends ViewRecord
{
    protected static string $resource = CyberIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
