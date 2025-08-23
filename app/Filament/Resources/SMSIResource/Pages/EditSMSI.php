<?php

namespace App\Filament\Resources\SMSIResource\Pages;

use App\Filament\Resources\SMSIResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSMSI extends EditRecord
{
    protected static string $resource = SMSIResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
