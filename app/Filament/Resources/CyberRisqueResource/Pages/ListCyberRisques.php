<?php

namespace App\Filament\Resources\CyberRisqueResource\Pages;

use App\Filament\Resources\CyberRisqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCyberRisques extends ListRecords
{
    protected static string $resource = CyberRisqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
