<?php
namespace App\Enums;

enum StatutCyberIncident: string
{
    case DETECTION = 'DETECTION';
    case ANALYSE = 'ANALYSE';
    case REMEDIATION = 'REMEDIATION';
    case RESOLU = 'RESOLU';
    case CLOTURE = 'CLOTURE';
}