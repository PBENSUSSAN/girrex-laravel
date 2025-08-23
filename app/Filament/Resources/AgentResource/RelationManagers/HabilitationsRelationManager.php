<?php

namespace App\Filament\Resources\AgentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HabilitationsRelationManager extends RelationManager
{
    protected static string $relationship = 'habilitations';

    protected static ?string $title = 'Habilitations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type_hab')
                    ->label('Type d\'habilitation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_obtention')
                    ->required(),
                Forms\Components\DatePicker::make('date_expiration'),
                Forms\Components\Select::make('statut')
                    ->enum(\App\Enums\StatutChoix::class)
                    ->options(\App\Enums\StatutChoix::class)
                    ->default('valide')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type_hab')
            ->columns([
                Tables\Columns\TextColumn::make('type_hab')->label('Type'),
                Tables\Columns\TextColumn::make('date_obtention')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('date_expiration')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('statut')->badge(),
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