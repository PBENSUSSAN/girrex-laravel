<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FNEResource\Pages;
use App\Filament\Resources\FNEResource\RelationManagers;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\Fne;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FNEResource extends Resource
{
    protected static ?string $model = Fne::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';
    protected static ?string $navigationGroup = 'Qualité Sécurité';
    protected static ?string $label = 'FNE';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_girrex')
                    ->label('ID Girrex')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('date_evenement')
                    ->required(),
                Forms\Components\Select::make('centre_id')
                    ->options(Centre::all()->pluck('nom_centre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('agent_implique_id')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('statut_fne')
                    ->options(\App\Enums\StatutFne::class)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_girrex')->label('ID')->searchable(),
                Tables\Columns\TextColumn::make('titre')->searchable(),
                Tables\Columns\TextColumn::make('statut_fne')->badge(),
                Tables\Columns\TextColumn::make('date_evenement')->date('d/m/Y')->sortable(),
            ])
            ->defaultSort('date_evenement', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RapportsExternesRelationManager::class,
            RelationManagers\RecommendationsRelationManager::class,
            RelationManagers\HistoriquePermanentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFNES::route('/'),
            'create' => Pages\CreateFNE::route('/create'),
            'edit' => Pages\EditFNE::route('/{record}/edit'),
            'view' => Pages\ViewFNE::route('/{record}'),
        ];
    }
}