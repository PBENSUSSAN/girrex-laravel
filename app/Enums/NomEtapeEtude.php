<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum NomEtapeEtude: string implements HasLabel {
    case PHASE_PREPARATOIRE = 'PREPA'; case FHA = 'FHA'; case PSSA = 'PSSA'; case SSA = 'SSA';
    public function getLabel(): ?string { return $this->value; }
}