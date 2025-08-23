<?php

namespace App\Filament\Resources\VolResource\RelationManagers;

use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SaisiesActivitesRelationManager extends RelationManager
{
    protected static string $relationship = 'saisiesActivites';
    protected static ?string $title = 'Agents sur le vol';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('agent_id')
                    ->label('Agent')
                    ->options(Agent::all()->pluck('nom', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('role')
                    ->enum(\App\Enums\Role::class)
                    ->options(\App\Enums\Role::class)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('agent.trigram')
                    ->label('Trigramme'),
                Tables\Columns\TextColumn::make('agent.nom'),
                Tables\Columns\TextColumn::make('role')
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(), // Bouton pour ajouter une nouvelle activité
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}