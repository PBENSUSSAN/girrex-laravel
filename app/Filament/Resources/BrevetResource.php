<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrevetResource\Pages;
use App\Filament\Resources\BrevetResource\RelationManagers;
use App\Models\Agent; // <-- IMPORTANT : Ajoutez cet import
use App\Models\Brevet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BrevetResource extends Resource
{
    protected static ?string $model = Brevet::class;

    protected static bool $shouldRegisterNavigation = false;
    
    protected static ?string $modelLabel = 'Brevet';
    protected static ?string $pluralModelLabel = 'Brevets';
    protected static ?string $recordTitleAttribute = 'numero_brevet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations du Brevet')
                    ->schema([
                        // --- CORRECTION DÉFINITIVE ICI ---
                        Forms\Components\Select::make('agent_id')
                            ->label('Titulaire du brevet')
                            // On construit les options manuellement
                            ->options(
                                Agent::all()->mapWithKeys(function ($agent) {
                                    return [$agent->id_agent => $agent->nom_complet];
                                })
                            )
                            ->searchable() // La recherche se fera sur la liste chargée
                            // On désactive la modification car on ne change pas le titulaire
                            ->disabled(fn (string $context): bool => $context === 'edit'),

                        Forms\Components\TextInput::make('numero_brevet')
                            ->label('Numéro de brevet')
                            ->required()
                            ->maxLength(100)
                            ->unique(ignoreRecord: true),
                            
                        Forms\Components\DatePicker::make('date_delivrance')
                            ->label('Date de délivrance')
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('agent.nom_complet')->label('Agent')->searchable(['nom', 'prenom'])->sortable(),
                Tables\Columns\TextColumn::make('numero_brevet')->searchable(),
                Tables\Columns\TextColumn::make('date_delivrance')->date('d/m/Y')->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\QualificationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrevets::route('/'),
            'create' => Pages\CreateBrevet::route('/create'),
            'view' => Pages\ViewBrevet::route('/{record}'),
            'edit' => Pages\EditBrevet::route('/{record}/edit'),
        ];
    }
}