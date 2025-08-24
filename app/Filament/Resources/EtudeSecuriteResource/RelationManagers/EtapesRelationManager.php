<?php
namespace App\Filament\Resources\EtudeSecuriteResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
class EtapesRelationManager extends RelationManager {
    protected static string $relationship = 'etapes';
    public function form(Form $form): Form { return $form->schema([]); }
    public function table(Table $table): Table {
        return $table->recordTitleAttribute('nom')
            ->columns([Tables\Columns\TextColumn::make('nom')])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}