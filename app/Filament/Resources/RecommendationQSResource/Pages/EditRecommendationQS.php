<?php

namespace App\Filament\Resources\RecommendationQSResource\Pages;

use App\Filament\Resources\RecommendationQSResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecommendationQS extends EditRecord
{
    protected static string $resource = RecommendationQSResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
