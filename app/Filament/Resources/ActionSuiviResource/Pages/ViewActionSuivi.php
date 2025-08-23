<?php

namespace App\Filament\Resources\ActionSuiviResource\Pages;

use App\Filament\Resources\ActionSuiviResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewActionSuivi extends ViewRecord
{
    protected static string $resource = ActionSuiviResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
