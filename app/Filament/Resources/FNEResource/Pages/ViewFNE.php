<?php

namespace App\Filament\Resources\FNEResource\Pages;

use App\Filament\Resources\FNEResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFNE extends ViewRecord
{
    protected static string $resource = FNEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
