<?php

namespace App\Filament\Resources\MisoResource\Pages;

use App\Filament\Resources\MisoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMiso extends ViewRecord
{
    protected static string $resource = MisoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
