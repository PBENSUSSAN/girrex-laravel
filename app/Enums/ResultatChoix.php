<?php
namespace App\Enums;

enum ResultatChoix: string
{
    case REUSSI = 'reussi';
    case ECHOUE = 'echoue';
    case EN_COURS = 'en_cours';
    case PLANIFIE = 'planifie';
    case SATISFAISANT = 'satisfaisant';
    case NON_SATISFAISANT = 'non_satisfaisant';
}