<?php

namespace App\Filament\Resources;

use App\Enums\TypeFormationContinue;
use App\Filament\Resources\SuiviFormationContinueResource\Pages;
use App\Models\Agent; // <-- IMPORTANT : Ajoutez cette ligne
use App\Models\SuiviFormationContinue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuiviFormationContinueResource extends Resource
{
    protected static ?string $model = SuiviFormationContinue::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?string $navigationGroup = 'Compétences';
    protected static ?string $modelLabel = 'Suivi Formation Continue';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- CORRECTION FINALE ET DÉFINITIVE ICI ---
                Forms\Components\Select::make('agent_id')
                    ->label('Agent')
                    // On construit nous-mêmes la liste des options
                    ->options(
                        Agent::all()->mapWithKeys(function ($agent) {
                            return [$agent->id_agent => $agent->nom_complet];
                        })
                    )
                    ->searchable() // La recherche se fera sur la liste chargée
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('type_formation')
                    ->options(TypeFormationContinue::class)
                    ->required(),

                Forms\Components\DatePicker::make('date_realisation')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // L'affichage ici reste correct car il utilise les relations Eloquent
                Tables\Columns\TextColumn::make('agent.nom_complet')
                    ->label('Agent')
                    ->searchable(['nom', 'prenom'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_formation')
                    ->badge(),
                Tables\Columns\TextColumn::make('date_realisation')
                    ->date('d/m/Y')
                    ->sortable(),
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
            'index' => Pages\ListSuiviFormationContinues::route('/'),
            'create' => Pages\CreateSuiviFormationContinue::route('/create'),
            'edit' => Pages\EditSuiviFormationContinue::route('/{record}/edit'),
        ];
    }
}