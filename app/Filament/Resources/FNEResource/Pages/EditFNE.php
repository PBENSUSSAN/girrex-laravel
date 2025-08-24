<?php

namespace App\Filament\Resources\FNEResource\Pages;

use App\Filament\Resources\FNEResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFNE extends EditRecord
{
    protected static string $resource = FNEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
