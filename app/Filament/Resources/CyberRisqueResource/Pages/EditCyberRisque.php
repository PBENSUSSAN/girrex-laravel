<?php

namespace App\Filament\Resources\CyberRisqueResource\Pages;

use App\Filament\Resources\CyberRisqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCyberRisque extends EditRecord
{
    protected static string $resource = CyberRisqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
