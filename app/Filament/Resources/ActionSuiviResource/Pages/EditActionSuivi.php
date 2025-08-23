<?php

namespace App\Filament\Resources\ActionSuiviResource\Pages;

use App\Filament\Resources\ActionSuiviResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActionSuivi extends EditRecord
{
    protected static string $resource = ActionSuiviResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
