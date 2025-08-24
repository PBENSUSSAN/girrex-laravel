<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutCyberRisque: string implements HasLabel
{
    case OUVERT = 'OUVERT'; case TRAITE = 'TRAITE'; case ACCEPTE = 'ACCEPTE'; case REFUSE = 'REFUSE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}