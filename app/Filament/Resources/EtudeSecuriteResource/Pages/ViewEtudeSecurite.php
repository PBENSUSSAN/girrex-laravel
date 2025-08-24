<?php

namespace App\Filament\Resources\EtudeSecuriteResource\Pages;

use App\Filament\Resources\EtudeSecuriteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEtudeSecurite extends ViewRecord
{
    protected static string $resource = EtudeSecuriteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
