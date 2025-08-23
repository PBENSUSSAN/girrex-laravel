<?php

namespace App\Filament\Resources\MisoResource\Pages;

use App\Filament\Resources\MisoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMisos extends ListRecords
{
    protected static string $resource = MisoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
