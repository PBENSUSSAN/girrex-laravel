<?php

namespace App\Filament\Resources\ChangementResource\Pages;

use App\Filament\Resources\ChangementResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChangement extends ViewRecord
{
    protected static string $resource = ChangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
