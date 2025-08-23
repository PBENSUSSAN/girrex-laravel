<?php
namespace App\Enums;

enum StatutChoix: string
{
    case VALIDE = 'valide';
    case EN_COURS = 'en_cours';
    case EXPIREE = 'expiree';
    case SUSPENDUE = 'suspendue';
    case RETIREE = 'retiree';
    case REVOQUEE = 'revoquee';
}