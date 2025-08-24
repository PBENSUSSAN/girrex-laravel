<?php

namespace App\Filament\Resources\MentionResource\Pages;

use App\Filament\Resources\MentionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMention extends EditRecord
{
    protected static string $resource = MentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
