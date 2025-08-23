<?php
namespace App\Enums;

enum ProbabiliteCyberRisque: string
{
    case TRES_FAIBLE = 'TRES_FAIBLE';
    case FAIBLE = 'FAIBLE';
    case MOYENNE = 'MOYENNE';
    case ELEVEE = 'ELEVEE';
}