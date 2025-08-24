<?php

namespace App\Filament\Resources\MentionLinguistiqueResource\Pages;

use App\Filament\Resources\MentionLinguistiqueResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMentionLinguistique extends EditRecord
{
    protected static string $resource = MentionLinguistiqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
