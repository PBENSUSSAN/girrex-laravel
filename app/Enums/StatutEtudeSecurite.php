<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutEtudeSecurite: string implements HasLabel {
    case INITIALISATION = 'INITIALISATION'; case INSTRUCTION_EN_COURS = 'INSTRUCTION_COURS'; case VALIDATION_FINALE = 'VALIDATION_FINALE'; case CLOTUREE = 'CLOTUREE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}