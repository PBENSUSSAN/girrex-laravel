<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChangementResource\Pages;
use App\Filament\Resources\ChangementResource\RelationManagers;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\Changement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChangementResource extends Resource
{
    protected static ?string $model = Changement::class;
    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string $navigationGroup = 'Études de Sécurité';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('initiateur_agent_id')
                    ->label('Initiateur (ES Local)')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('centre_principal_id')
                    ->label('Centre Pilote')
                    ->options(Centre::all()->pluck('nom_centre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\FileUpload::make('fichier_notification_initiale')
                    ->directory('es-notifications')
                    ->required(),
                Forms\Components\Select::make('correspondant_dircam_agent_id')
                    ->label('Correspondant (ES National)')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('classification')
                    ->options(\App\Enums\ClassificationChangement::class)
                    ->required(),
                Forms\Components\Select::make('statut')
                    ->options(\App\Enums\StatutProcessusChangement::class)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('centrePrincipal.code_centre')
                    ->label('Centre'),
                Tables\Columns\TextColumn::make('statut')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->date('d/m/Y'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\EtudeSecuriteRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChangements::route('/'),
            'create' => Pages\CreateChangement::route('/create'),
            'edit' => Pages\EditChangement::route('/{record}/edit'),
            'view' => Pages\ViewChangement::route('/{record}'),
        ];
    }
}