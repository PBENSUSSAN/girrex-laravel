<?php

namespace App\Filament\Resources\FNEResource\Pages;

use App\Filament\Resources\FNEResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFNES extends ListRecords
{
    protected static string $resource = FNEResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
