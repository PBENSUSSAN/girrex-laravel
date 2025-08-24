<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SMSIResource\RelationManagers;
use App\Filament\Resources\SMSIResource\Pages;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\Document;
use App\Models\SMSI;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SMSIResource extends Resource
{
    protected static ?string $model = SMSI::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $label = 'Dossier SMSI';
    protected static ?string $pluralLabel = 'Dossiers SMSI';
    protected static ?string $navigationGroup = 'Cybersécurité';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('centre_id')
                    ->relationship('centre', 'nom_centre')
                    ->required(),
                Forms\Components\Select::make('relais_local_agent_id')
                    ->label('Relais Local')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('manuel_management_doc_id')
                    ->label('Manuel de Management')
                    ->options(Document::all()->pluck('intitule', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('programme_surete_doc_id')
                    ->label('Programme de Sûreté')
                    ->options(Document::all()->pluck('intitule', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('centre.nom_centre')
                    ->label('Centre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('relaisLocal.trigram')
                    ->label('Relais Local'),
            ])
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
        RelationManagers\RisquesRelationManager::class,
        RelationManagers\IncidentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSMSIS::route('/'),
            'create' => Pages\CreateSMSI::route('/create'),
            'edit' => Pages\EditSMSI::route('/{record}/edit'),
            'view' => Pages\ViewSMSI::route('/{record}'),
        ];
    }
}