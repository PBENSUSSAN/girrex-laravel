<?php

namespace App\Filament\Resources\ChangementResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class EtudeSecuriteRelationManager extends RelationManager
{
    protected static string $relationship = 'etudeSecurite';

    protected static ?string $title = 'Étude de Sécurité Associée';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reference_etude')
                    ->label('Référence de l\'étude')
                    ->required()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('type_etude')
                    ->options(\App\Enums\TypeEtudeSecurite::class)
                    ->required(),
                Forms\Components\Select::make('statut')
                    ->options(\App\Enums\StatutEtudeSecurite::class)
                    ->required()
                    ->default('INITIALISATION'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('reference_etude')
            ->columns([
                Tables\Columns\TextColumn::make('reference_etude'),
                Tables\Columns\TextColumn::make('type_etude')->badge(),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    // On ne peut créer qu'une seule étude par changement
                    ->visible(fn (): bool => ! $this->ownerRecord->etudeSecurite()->exists()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ]);
    }
}