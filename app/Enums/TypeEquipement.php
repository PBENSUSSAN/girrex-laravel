<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum TypeEquipement: string implements HasLabel
{
    case RADIO = 'RADIO';
    case RADAR = 'RADAR';
    case VISU = 'VISU';
    case TELEPHONE = 'TELEPHONIE';
    case INTERPHONE = 'INTERPHONIE';
    case INFRA = 'INFRA';
    case AUTRE = 'AUTRE';

    public function getLabel(): ?string
    {
        // Ici, vous pourriez traduire si nécessaire, pour l'instant on retourne la valeur.
        return $this->value;
    }
}