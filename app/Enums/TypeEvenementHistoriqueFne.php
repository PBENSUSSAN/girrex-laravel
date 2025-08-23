<?php
namespace App\Enums;

enum TypeEvenementHistoriqueFne: string
{
    case CREATION = 'CREATION';
    case DECLARATION_OASIS = 'DECLARATION_OASIS';
    case COMMENTAIRE = 'COMMENTAIRE';
    case CHANGEMENT_STATUT_INSTRUCTION = 'CHANGEMENT_STATUT_INSTRUCTION';
    case CLOTURE = 'CLOTURE';
}