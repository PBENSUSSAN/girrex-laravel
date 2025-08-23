<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum TypeMaintenance: string implements HasLabel
{
    case RADIO = 'RADIO';
    case RADAR = 'RADAR';
    case VISU = 'VISU';
    case INFRA = 'INFRA';
    case AUTRE = 'AUTRE';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}