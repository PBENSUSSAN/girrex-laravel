<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Filament\Resources\AgentResource\RelationManagers;
use App\Models\Agent;
use App\Models\Centre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Core';
    protected static ?int $navigationSort = 1;
    protected static ?string $modelLabel = 'Agent';
    protected static ?string $pluralModelLabel = 'Agents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_agent')
                    ->label('ID Agent (Legacy)')
                    ->numeric()
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('trigram')
                    ->label('Trigramme')
                    ->maxLength(10)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('prenom')
                    ->label('Prénom')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('centre_id')
                    ->label('Centre de rattachement')
                    ->options(Centre::all()->pluck('nom_centre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('type_agent')
                    // Note: Il serait mieux d'utiliser un Enum ici `->options(TypeAgent::class)`
                    ->options([
                        'controleur' => 'Contrôleur',
                        'administratif' => 'Administratif',
                        'technique' => 'Technique',
                        'autre' => 'Autre',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('actif')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trigram')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prenom')
                    ->label('Prénom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('centre.nom_centre')
                    ->label('Centre')
                    ->sortable(),
                Tables\Columns\IconColumn::make('actif')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(), // --- CORRECTION 2 : Ajout du bouton Voir ---
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // On s'assure que seul le manager du brevet est actif pour l'instant
            RelationManagers\BrevetsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            // --- CORRECTION 3 : On simplifie la route car getRouteKeyName() est défini sur le modèle ---
            'view' => Pages\ViewAgent::route('/{record}'), 
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }
}