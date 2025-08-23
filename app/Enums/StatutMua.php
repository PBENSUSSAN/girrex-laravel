<?php

namespace App\Enums;

enum StatutMua: string
{
    case ACTIF = 'ACTIF';
    case SUSPENDU_INACTIVITE = 'SUSPENDU_INACTIVITE';
    case SUSPENDU_MANUEL = 'SUSPENDU_MANUEL';
    case EN_ATTENTE_RENOUVELLEMENT = 'EN_ATTENTE_RENOUVELLEMENT';
    case ARCHIVE = 'ARCHIVE';
}