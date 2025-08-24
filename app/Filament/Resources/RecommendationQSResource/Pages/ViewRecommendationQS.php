<?php

namespace App\Filament\Resources\RecommendationQSResource\Pages;

use App\Filament\Resources\RecommendationQSResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRecommendationQS extends ViewRecord
{
    protected static string $resource = RecommendationQSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
