<?php
namespace App\Enums;

enum TypeEvenementCyberHistorique: string
{
    case CREATION = 'CREATION';
    case CHANGEMENT_STATUT = 'CHANGEMENT_STATUT';
    case MODIFICATION = 'MODIFICATION';
    case COMMENTAIRE = 'COMMENTAIRE';
    case QUALIFICATION = 'QUALIFICATION';
    case RESOLUTION = 'RESOLUTION';
}