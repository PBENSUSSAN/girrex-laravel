<?php
namespace App\Enums;

enum ModuleApp: string
{
    case GENERAL = 'GENERAL';
    case PLANNING = 'PLANNING';
    case FEUILLE_TEMPS = 'FEUILLE_TEMPS';
    case CAHIER_DE_MARCHE = 'CAHIER_DE_MARCHE';
    case DOCUMENTATION = 'DOCUMENTATION';
    case TECHNIQUE = 'TECHNIQUE';
    case QS = 'QS';
    case ES = 'ES';
    case CYBER = 'CYBER';
    case SUIVI = 'SUIVI';
    case FEEDBACK = 'FEEDBACK';
}