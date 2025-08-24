<?php

namespace App\Filament\Resources\SuiviFormationContinueResource\Pages;

use App\Filament\Resources\SuiviFormationContinueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuiviFormationContinue extends EditRecord
{
    protected static string $resource = SuiviFormationContinueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
