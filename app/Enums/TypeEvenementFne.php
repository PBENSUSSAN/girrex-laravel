<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum TypeEvenementFne: string implements HasLabel {
    case ATM = 'ATM'; case TECHNIQUE = 'TECHNIQUE'; case AUTRE = 'AUTRE';
    public function getLabel(): ?string { return $this->value; }
}