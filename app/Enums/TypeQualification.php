<?php

namespace App\Enums;

enum TypeQualification: string
{
    // CAM
    case CAER = 'CAER';
    case PC = 'PC';
    case CDQ = 'CDQ';
    case ISP = 'ISP';
    case EXA = 'EXA';
    // CAG
    case ACS = 'ACS';
    case APS = 'APS';
    case ADI = 'ADI';
    case ADV = 'ADV';
}