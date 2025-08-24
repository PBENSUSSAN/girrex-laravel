<?php

namespace App\Filament\Resources\FormationReglementaireResource\Pages;

use App\Filament\Resources\FormationReglementaireResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormationReglementaires extends ListRecords
{
    protected static string $resource = FormationReglementaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
