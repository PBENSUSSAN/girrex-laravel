<?php

namespace App\Filament\Resources\EtudeSecuriteResource\Pages;

use App\Filament\Resources\EtudeSecuriteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEtudeSecurites extends ListRecords
{
    protected static string $resource = EtudeSecuriteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
