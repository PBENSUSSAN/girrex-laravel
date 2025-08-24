<?php

namespace App\Filament\Resources\FormationReglementaireResource\Pages;

use App\Filament\Resources\FormationReglementaireResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormationReglementaire extends EditRecord
{
    protected static string $resource = FormationReglementaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
