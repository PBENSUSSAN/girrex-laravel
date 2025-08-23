<?php
namespace App\Enums;

enum TypeAgent: string
{
    case CONTROLEUR = 'controleur';
    case ADMINISTRATIF = 'administratif';
    case TECHNIQUE = 'technique';
    case AUTRE = 'autre';
}