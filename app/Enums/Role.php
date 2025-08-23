<?php

namespace App\Enums;

enum Role: string
{
    case CONTROLEUR = 'CONTROLEUR';
    case STAGIAIRE = 'STAGIAIRE';
    case ISP = 'ISP';
    case CDQ = 'CDQ';
    case SUPERVISEUR = 'SUPERVISEUR';
}