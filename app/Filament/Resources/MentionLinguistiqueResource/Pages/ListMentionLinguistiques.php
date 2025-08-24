<?php

namespace App\Filament\Resources\MentionLinguistiqueResource\Pages;

use App\Filament\Resources\MentionLinguistiqueResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMentionLinguistiques extends ListRecords
{
    protected static string $resource = MentionLinguistiqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
