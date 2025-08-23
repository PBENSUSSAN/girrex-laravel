<?php
namespace App\Enums;

enum StatutProcessusChangement: string
{
    case NOTIFICATION = 'NOTIFICATION';
    case ETUDE_REQUISE = 'ETUDE_REQUISE';
    case REALISATION = 'REALISATION';
    case CLOS = 'CLOS';
}