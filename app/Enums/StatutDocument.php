<?php
namespace App\Enums;

enum StatutDocument: string
{
    case EN_REDACTION = 'EN_REDACTION';
    case EN_VIGUEUR = 'EN_VIGUEUR';
    case REMPLACE = 'REMPLACE';
    case ARCHIVE = 'ARCHIVE';
}