<?php

namespace App\Filament\Resources\ZoneResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CentresRelationManager extends RelationManager
{
    protected static string $relationship = 'centres';
    protected static ?string $modelLabel = 'Centre';


    public function form(Form $form): Form
    {
        // Ce formulaire est utilisé pour créer un NOUVEAU centre directement depuis une zone
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom_centre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code_centre')
                    ->required()
                    ->maxLength(10)
                    ->unique(ignoreRecord: true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nom_centre')
            ->columns([
                Tables\Columns\TextColumn::make('nom_centre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code_centre')
                    ->searchable(),
                Tables\Columns\IconColumn::make('gere_aps')
                    ->label('APS')
                    ->boolean(),
                Tables\Columns\IconColumn::make('gere_tour')
                    ->label('Tour')
                    ->boolean(),
            ])
            ->filters([
                // Pas de filtres nécessaires ici pour l'instant
            ])
            ->headerActions([
                // Bouton "Nouveau Centre"
                Tables\Actions\CreateAction::make(), 
                // Bouton "Attacher" qui permet de lier un centre déjà existant
                Tables\Actions\AttachAction::make(), 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Bouton "Détacher" qui permet de délier un centre (sans le supprimer)
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}