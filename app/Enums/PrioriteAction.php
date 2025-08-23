<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PrioriteAction: string implements HasLabel
{
    case BASSE = 'BASSE';
    case MOYENNE = 'MOYENNE';
    case HAUTE = 'HAUTE';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}