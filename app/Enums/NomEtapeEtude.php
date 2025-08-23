<?php
namespace App\Enums;

enum NomEtapeEtude: string
{
    case PHASE_PREPARATOIRE = 'PREPA';
    case FHA = 'FHA';
    case PSSA = 'PSSA';
    case SSA = 'SSA';
}