<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CategorieFeedback: string implements HasLabel
{
    case BUG = 'BUG';
    case AMELIORATION = 'AMELIORATION';
    case QUESTION = 'QUESTION';
    case AUTRE = 'AUTRE';

    public function getLabel(): ?string
    {
        return str_replace('_', ' ', $this->value);
    }
}