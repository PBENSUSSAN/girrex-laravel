<?php

namespace App\Filament\Resources\BrevetResource\Pages;

use App\Filament\Resources\BrevetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrevet extends EditRecord
{
    protected static string $resource = BrevetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * Cette méthode indique à Filament d'afficher les "widgets" (y compris les Relation Managers)
     * en pied de page, après le formulaire principal.
     */
    protected function getFooterWidgets(): array
    {
        return [
            BrevetResource::getRelations(),
        ];
    }
}