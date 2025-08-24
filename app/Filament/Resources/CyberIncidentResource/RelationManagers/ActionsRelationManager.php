<?php

// --- LE NAMESPACE EST DIFFÉRENT ICI ---
namespace App\Filament\Resources\CyberIncidentResource\RelationManagers;

use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ActionsRelationManager extends RelationManager
{
    protected static string $relationship = 'actions';
    protected static ?string $title = 'Actions de Suivi';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('titre')->required()->columnSpanFull(),
            Forms\Components\Select::make('responsable_agent_id')->label('Responsable')->options(Agent::all()->pluck('trigram', 'id_agent'))->required(),
            Forms\Components\DatePicker::make('echeance')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->recordTitleAttribute('titre')->columns([
            Tables\Columns\TextColumn::make('titre'),
            Tables\Columns\TextColumn::make('responsable.trigram'),
            Tables\Columns\TextColumn::make('echeance')->date('d/m/Y'),
        ])
        ->headerActions([Tables\Actions\CreateAction::make()])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}