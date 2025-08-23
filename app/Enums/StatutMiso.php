<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatutMiso: string implements HasLabel
{
    case ANNULE = 'ANNULE';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}