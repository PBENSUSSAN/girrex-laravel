<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CyberRisqueResource\Pages;
use App\Filament\Resources\CyberRisqueResource\RelationManagers;
use App\Models\CyberRisque;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CyberRisqueResource extends Resource
{
    protected static ?string $model = CyberRisque::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';
    protected static ?string $navigationGroup = 'Cybersécurité';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Cyber Risque';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('smsi_id')
                    ->relationship(name: 'smsi.centre', titleAttribute: 'nom_centre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('SMSI (Centre)'),
                Forms\Components\Textarea::make('description')->required()->columnSpanFull(),
                Forms\Components\Select::make('gravite')->options(\App\Enums\GraviteCyberRisque::class)->required(),
                Forms\Components\Select::make('probabilite')->options(\App\Enums\ProbabiliteCyberRisque::class)->required(),
                Forms\Components\Select::make('statut')->options(\App\Enums\StatutCyberRisque::class)->required()->default('OUVERT'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('smsi.centre.nom_centre')->label('Centre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('description')->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('gravite')->badge(),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ActionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCyberRisques::route('/'),
            'create' => Pages\CreateCyberRisque::route('/create'),
            'view' => Pages\ViewCyberRisque::route('/{record}'),
            'edit' => Pages\EditCyberRisque::route('/{record}/edit'),
        ];
    }
}