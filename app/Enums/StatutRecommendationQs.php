<?php
namespace App\Enums;

enum StatutRecommendationQs: string
{
    case PROPOSEE = 'PROPOSEE';
    case ACCEPTEE = 'ACCEPTEE';
    case REFUSEE = 'REFUSEE';
    case IMPLEMENTEE = 'IMPLEMENTEE';
}