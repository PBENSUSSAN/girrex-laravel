<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum GraviteCyberRisque: string implements HasLabel
{
    case FAIBLE = 'FAIBLE'; case MOYENNE = 'MOYENNE'; case ELEVEE = 'ELEVEE'; case CRITIQUE = 'CRITIQUE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}