<?php

namespace App\Filament\Resources\PanneCentreResource\Pages;

use App\Filament\Resources\PanneCentreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPanneCentre extends EditRecord
{
    protected static string $resource = PanneCentreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
