<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum TypeEtudeSecurite: string implements HasLabel {
    case DOSSIER_SECURITE = 'DOSSIER_SECURITE'; case EPIS = 'EPIS'; case DSSL = 'DSSL';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}