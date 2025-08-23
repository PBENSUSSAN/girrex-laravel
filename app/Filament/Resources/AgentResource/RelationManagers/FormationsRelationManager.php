<?php
namespace App\Filament\Resources\AgentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class FormationsRelationManager extends RelationManager
{
    protected static string $relationship = 'formations';
    protected static ?string $title = 'Formations Suivies';

    public function form(Form $form): Form
    {
        return $form->schema([
            // ... Formulaire à compléter plus tard
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module.module')->label('Module'),
                Tables\Columns\TextColumn::make('annee'),
                Tables\Columns\TextColumn::make('resultat')->badge(),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}