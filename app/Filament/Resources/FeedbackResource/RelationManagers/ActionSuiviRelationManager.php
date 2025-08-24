<?php

namespace App\Filament\Resources\FeedbackResource\RelationManagers;

use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActionSuiviRelationManager extends RelationManager
{
    protected static string $relationship = 'actionSuivi';

    protected static ?string $title = 'Actions de Suivi';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('responsable_agent_id')
                    ->label('Responsable')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\DatePicker::make('echeance')
                    ->required(),
                Forms\Components\Select::make('priorite')
                    ->options(\App\Enums\PrioriteAction::class)
                    ->required(),
                Forms\Components\Select::make('statut')
                    ->options(\App\Enums\StatutAction::class)
                    ->required()
                    ->default('A_FAIRE'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('titre')
            ->columns([
                Tables\Columns\TextColumn::make('titre'),
                Tables\Columns\TextColumn::make('responsable.trigram')->label('Resp.'),
                Tables\Columns\TextColumn::make('statut')->badge(),
                Tables\Columns\TextColumn::make('echeance')->date('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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