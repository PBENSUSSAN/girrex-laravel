<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum TypeClotureFne: string implements HasLabel {
    case STANDARD = 'STANDARD'; case CLS = 'CLS'; case CLM = 'CLM';
    public function getLabel(): ?string { return $this->value; }
}