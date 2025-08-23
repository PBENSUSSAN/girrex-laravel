<?php
namespace App\Enums;

enum StatutAction: string
{
    case A_FAIRE = 'A_FAIRE';
    case EN_COURS = 'EN_COURS';
    case A_VALIDER = 'A_VALIDER';
    case VALIDEE = 'VALIDEE';
    case REFUSEE = 'REFUSEE';
    case ARCHIVEE = 'ARCHIVEE';
}