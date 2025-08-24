<?php

namespace App\Filament\Resources\RecommendationQSResource\Pages;

use App\Filament\Resources\RecommendationQSResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecommendationQS extends ListRecords
{
    protected static string $resource = RecommendationQSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
