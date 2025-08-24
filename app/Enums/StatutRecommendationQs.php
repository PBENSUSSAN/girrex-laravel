<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutRecommendationQs: string implements HasLabel {
    case PROPOSEE = 'PROPOSEE'; case ACCEPTEE = 'ACCEPTEE'; case REFUSEE = 'REFUSEE'; case IMPLEMENTEE = 'IMPLEMENTEE';
    public function getLabel(): ?string { return $this->value; }
}