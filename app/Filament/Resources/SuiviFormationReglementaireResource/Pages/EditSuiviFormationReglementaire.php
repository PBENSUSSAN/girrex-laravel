<?php

namespace App\Filament\Resources\SuiviFormationReglementaireResource\Pages;

use App\Filament\Resources\SuiviFormationReglementaireResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuiviFormationReglementaire extends EditRecord
{
    protected static string $resource = SuiviFormationReglementaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
