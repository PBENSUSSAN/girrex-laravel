<?php

namespace App\Enums;

enum TypeEvenementCarriere: string
{
    case SUSPENSION_MANUELLE = 'SUSPENSION_MANUELLE';
    case REPRISE_ACTIVITE = 'REPRISE_ACTIVITE';
    case AUTRE = 'AUTRE';
}