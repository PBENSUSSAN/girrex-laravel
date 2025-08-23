<?php

namespace App\Filament\Resources\SaisieActiviteResource\Pages;

use App\Filament\Resources\SaisieActiviteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaisieActivites extends ListRecords
{
    protected static string $resource = SaisieActiviteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
