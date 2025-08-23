<?php

namespace App\Filament\Resources\MisoResource\Pages;

use App\Filament\Resources\MisoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMiso extends EditRecord
{
    protected static string $resource = MisoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
