<?php
namespace App\Filament\Resources\AgentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BrevetRelationManager extends RelationManager
{
    protected static string $relationship = 'brevet';
    protected static ?string $title = 'Brevet de Contrôleur';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('numero_brevet')->required()->maxLength(100),
            Forms\Components\DatePicker::make('date_delivrance')->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('numero_brevet')
            ->columns([
                Tables\Columns\TextColumn::make('numero_brevet'),
                Tables\Columns\TextColumn::make('date_delivrance')->date('d/m/Y'),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([]);
    }
}