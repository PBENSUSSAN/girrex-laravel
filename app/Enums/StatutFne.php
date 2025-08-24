<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;
enum StatutFne: string implements HasLabel {
    case PRE_DECLAREE = 'PRE_DECLAREE';
    case EN_ATTENTE_INSTRUCTION = 'ATTENTE_INSTRUCTION';
    case INSTRUCTION_EN_COURS = 'INSTRUCTION_COURS';
    case ATTENTE_PROLONGATION = 'ATTENTE_PROLONGATION';
    case CLOTUREE = 'CLOTUREE';
    case CLOTUREE_PROLONGATION = 'CLOTUREE_PROLONGATION';
    public function getLabel(): ?string { return str_replace('_', ' ', $this->value); }
}