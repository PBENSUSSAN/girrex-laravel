<?php

namespace App\Filament\Resources\AgentResource\RelationManagers;

use App\Filament\Resources\BrevetResource;
use App\Models\Brevet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class BrevetsRelationManager extends RelationManager
{
    protected static string $relationship = 'brevet';
    protected static ?string $recordTitleAttribute = 'numero_brevet';
    protected static ?string $title = 'Brevet de Contrôleur';
    protected static ?string $modelLabel = 'Brevet';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numero_brevet')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('date_delivrance')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('numero_brevet'),
                Tables\Columns\TextColumn::make('date_delivrance')->date('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn (): bool => ! $this->ownerRecord->brevet()->exists()),
            ])
            ->actions([
                // --- ON S'ASSURE QUE LES BOUTONS SONT BIEN LÀ ---
                Tables\Actions\ViewAction::make()
                    ->url(fn (Brevet $record): string => BrevetResource::getUrl('view', ['record' => $record])),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}