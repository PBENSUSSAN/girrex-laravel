<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatutAction: string implements HasLabel
{
    case A_FAIRE = 'A_FAIRE';
    case EN_COURS = 'EN_COURS';
    case A_VALIDER = 'A_VALIDER';
    case VALIDEE = 'VALIDEE';
    case REFUSEE = 'REFUSEE';
    case ARCHIVEE = 'ARCHIVEE';

    public function getLabel(): ?string
    {
        return str_replace('_', ' ', $this->value);
    }
}