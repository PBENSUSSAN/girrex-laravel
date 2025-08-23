<?php

namespace App\Filament\Resources\PanneCentreResource\Pages;

use App\Filament\Resources\PanneCentreResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPanneCentre extends ViewRecord
{
    protected static string $resource = PanneCentreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
