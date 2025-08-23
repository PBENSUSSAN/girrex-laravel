<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatutDocument: string implements HasLabel
{
    case EN_REDACTION = 'EN_REDACTION';
    case EN_VIGUEUR = 'EN_VIGUEUR';
    case REMPLACE = 'REMPLACE';
    case ARCHIVE = 'ARCHIVE';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::EN_REDACTION => 'En Rédaction',
            self::EN_VIGUEUR => 'En Vigueur',
            self::REMPLACE => 'Remplacé',
            self::ARCHIVE => 'Archivé',
        };
    }
}