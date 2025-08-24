<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum TypeEvenementHistoriqueFne: string implements HasLabel {
    case CREATION = 'CREATION'; case DECLARATION_OASIS = 'DECLARATION_OASIS'; case COMMENTAIRE = 'COMMENTAIRE'; case CHANGEMENT_STATUT_INSTRUCTION = 'CHANGEMENT_STATUT_INSTRUCTION'; case CLOTURE = 'CLOTURE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}