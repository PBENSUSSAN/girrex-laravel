<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaisieActiviteResource\Pages;
use App\Models\Agent;
use App\Models\SaisieActivite;
use App\Models\Vol;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SaisieActiviteResource extends Resource
{
    protected static ?string $model = SaisieActivite::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $label = 'Saisie d\'activité';
    protected static ?string $pluralLabel = 'Saisies d\'activité';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vol_id')
                    ->label('Vol concerné')
                    ->relationship('vol', 'indicatif')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('agent_id')
                    ->label('Agent')
                    ->options(Agent::all()->pluck('nom', 'id_agent')) // On utilise nom et id_agent
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('role')
                    ->enum(\App\Enums\Role::class)
                    ->options(\App\Enums\Role::class)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vol.indicatif')
                    ->label('Indicatif Vol')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('agent.trigram')
                    ->label('Trigramme Agent')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date de création')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaisieActivites::route('/'),
            'create' => Pages\CreateSaisieActivite::route('/create'),
            'edit' => Pages\EditSaisieActivite::route('/{record}/edit'),
        ];
    }
}