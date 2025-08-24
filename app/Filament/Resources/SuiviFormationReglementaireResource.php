<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuiviFormationReglementaireResource\Pages;
use App\Models\SuiviFormationReglementaire;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuiviFormationReglementaireResource extends Resource
{
    protected static ?string $model = SuiviFormationReglementaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationGroup = 'Compétences';
    protected static ?string $modelLabel = 'Suivi Réglementaire';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('brevet_id')
                    ->relationship('brevet', 'numero_brevet')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Brevet'),
                    
                Forms\Components\Select::make('formation_id')
                    ->relationship('formation', 'nom')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Formation Réglementaire'),

                Forms\Components\DatePicker::make('date_realisation')
                    ->required(),

                Forms\Components\DatePicker::make('date_echeance')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // On affiche les informations des tables liées
                Tables\Columns\TextColumn::make('brevet.agent.nom_complet') // Affiche "NOM Prénom" de l'agent
                    ->label('Agent')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brevet.numero_brevet')
                    ->label('Brevet N°')
                    ->searchable(),
                Tables\Columns\TextColumn::make('formation.nom')
                    ->label('Formation')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_realisation')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_echeance')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn ($state) => $state->isPast() ? 'danger' : 'success'), // Met en rouge si la date est dépassée
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuiviFormationReglementaires::route('/'),
            'create' => Pages\CreateSuiviFormationReglementaire::route('/create'),
            'edit' => Pages\EditSuiviFormationReglementaire::route('/{record}/edit'),
        ];
    }
}