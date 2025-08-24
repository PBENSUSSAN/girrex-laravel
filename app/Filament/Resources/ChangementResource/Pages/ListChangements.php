<?php

namespace App\Filament\Resources\ChangementResource\Pages;

use App\Filament\Resources\ChangementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChangements extends ListRecords
{
    protected static string $resource = ChangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
