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
            RelationManagers\BrevetRelationManager::class,
            RelationManagers\FormationsRelationManager::class,
            RelationManagers\EvaluationsRelationManager::class,
            RelationManagers\HabilitationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'edit' => Pages\EditAgent::route('/{record:id_agent}/edit'),
        ];
    }
}