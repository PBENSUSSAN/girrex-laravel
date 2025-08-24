<?php

namespace App\Filament\Resources\ChangementResource\Pages;

use App\Filament\Resources\ChangementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChangement extends EditRecord
{
    protected static string $resource = ChangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
