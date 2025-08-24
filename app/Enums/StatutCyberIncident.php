<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutCyberIncident: string implements HasLabel
{
    case DETECTION = 'DETECTION'; case ANALYSE = 'ANALYSE'; case REMEDIATION = 'REMEDIATION'; case RESOLU = 'RESOLU'; case CLOTURE = 'CLOTURE';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}