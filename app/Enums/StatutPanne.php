<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum StatutPanne: string implements HasLabel
{
    case EN_COURS = 'EN_COURS';
    case RESOLUE = 'RESOLUE';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}