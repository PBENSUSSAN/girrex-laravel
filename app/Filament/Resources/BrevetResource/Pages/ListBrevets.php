<?php

namespace App\Filament\Resources\BrevetResource\Pages;

use App\Filament\Resources\BrevetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrevets extends ListRecords
{
    protected static string $resource = BrevetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
