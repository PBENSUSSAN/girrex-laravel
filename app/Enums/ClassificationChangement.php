<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum ClassificationChangement: string implements HasLabel {
    case NON_DEFINI = 'NON_DEFINI'; case SUIVI = 'SUIVI'; case NON_SUIVI = 'NON_SUIVI';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}