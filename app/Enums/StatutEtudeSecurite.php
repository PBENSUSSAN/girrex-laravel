<?php
namespace App\Enums;

enum StatutEtudeSecurite: string
{
    case INITIALISATION = 'INITIALISATION';
    case INSTRUCTION_EN_COURS = 'INSTRUCTION_COURS';
    case VALIDATION_FINALE = 'VALIDATION_FINALE';
    case CLOTUREE = 'CLOTUREE';
}