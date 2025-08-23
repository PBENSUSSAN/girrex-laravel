<?php

namespace App\Filament\Resources\SMSIResource\Pages;

use App\Filament\Resources\SMSIResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSMSI extends ViewRecord
{
    protected static string $resource = SMSIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
