<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum CriticitePanne: string implements HasLabel
{
    case CRITIQUE = 'CRITIQUE';
    case MAJEURE = 'MAJEURE';
    case MINEURE = 'MINEURE';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}