<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PanneCentreResource\Pages;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\PanneCentre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PanneCentreResource extends Resource
{
    protected static ?string $model = PanneCentre::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $label = 'Panne';
    protected static ?string $pluralLabel = 'Pannes';
    protected static ?string $navigationGroup = 'Technique';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails de la panne')
                    ->schema([
                        Forms\Components\Select::make('centre_id')
                            ->label('Centre concerné')
                            ->options(Centre::all()->pluck('nom_centre', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('auteur_agent_id')
                            ->label('Auteur de la consignation')
                            ->options(Agent::all()->pluck('trigram', 'id_agent'))
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('type_equipement')
                            ->options(\App\Enums\TypeEquipement::class)
                            ->required(),
                        Forms\Components\TextInput::make('equipement_details')
                            ->label('Précisions équipement')
                            ->maxLength(255),
                        Forms\Components\DateTimePicker::make('date_heure_debut')
                            ->required(),
                        Forms\Components\DateTimePicker::make('date_heure_fin'),
                    ])->columns(2),
                Forms\Components\Section::make('Qualification et Suivi')
                    ->schema([
                        Forms\Components\Select::make('criticite')
                            ->options(\App\Enums\CriticitePanne::class)
                            ->required(),
                        Forms\Components\Select::make('statut')
                            ->options(\App\Enums\StatutPanne::class)
                            ->required()
                            ->default('EN_COURS'),
                        Forms\Components\Toggle::make('notification_generale')
                            ->label('Signaler pour notification générale'),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(3)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_heure_debut')
                    ->label('Début')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('centre.code_centre')
                    ->label('Centre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_equipement')
                    ->badge(),
                Tables\Columns\TextColumn::make('criticite')
                    ->badge()
                    ->color(fn ($state): string => match ($state->value) { // <-- CORRECTION ICI
                        'MINEURE' => 'gray',
                        'MAJEURE' => 'warning',
                        'CRITIQUE' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('statut')
                    ->badge()
                    ->color(fn ($state): string => match ($state->value) { // <-- CORRECTION ICI
                        'EN_COURS' => 'warning',
                        'RESOLUE' => 'success',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('date_heure_debut', 'desc')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPanneCentres::route('/'),
            'create' => Pages\CreatePanneCentre::route('/create'),
            'edit' => Pages\EditPanneCentre::route('/{record}/edit'),
            'view' => Pages\ViewPanneCentre::route('/{record}'),
        ];
    }
}