<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutProcessusChangement: string implements HasLabel {
    case NOTIFICATION = 'NOTIFICATION'; case ETUDE_REQUISE = 'ETUDE_REQUISE'; case REALISATION = 'REALISATION'; case CLOS = 'CLOS';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}