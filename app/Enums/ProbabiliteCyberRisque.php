<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum ProbabiliteCyberRisque: string implements HasLabel
{
    case TRES_FAIBLE = 'TRES_FAIBLE'; case FAIBLE = 'FAIBLE'; case MOYENNE = 'MOYENNE'; case ELEVEE = 'ELEVEE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}