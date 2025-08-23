<?php

namespace App\Filament\Resources\PanneCentreResource\Pages;

use App\Filament\Resources\PanneCentreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPanneCentres extends ListRecords
{
    protected static string $resource = PanneCentreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
