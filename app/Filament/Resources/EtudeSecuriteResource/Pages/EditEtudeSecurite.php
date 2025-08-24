<?php

namespace App\Filament\Resources\EtudeSecuriteResource\Pages;

use App\Filament\Resources\EtudeSecuriteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEtudeSecurite extends EditRecord
{
    protected static string $resource = EtudeSecuriteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
