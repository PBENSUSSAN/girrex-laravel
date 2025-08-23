<?php

namespace App\Filament\Resources\VolResource\Pages;

use App\Filament\Resources\VolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVols extends ListRecords
{
    protected static string $resource = VolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
