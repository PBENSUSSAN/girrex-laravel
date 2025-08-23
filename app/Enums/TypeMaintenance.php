<?php
namespace App\Enums;

enum TypeMaintenance: string
{
    case RADIO = 'RADIO';
    case RADAR = 'RADAR';
    case VISU = 'VISU';
    case INFRA = 'INFRA';
    case AUTRE = 'AUTRE';
}