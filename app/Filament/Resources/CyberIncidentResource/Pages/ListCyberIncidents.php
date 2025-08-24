<?php

namespace App\Filament\Resources\CyberIncidentResource\Pages;

use App\Filament\Resources\CyberIncidentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCyberIncidents extends ListRecords
{
    protected static string $resource = CyberIncidentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
