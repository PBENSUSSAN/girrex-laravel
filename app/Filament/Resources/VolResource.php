<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolResource\Pages;
use App\Filament\Resources\VolResource\RelationManagers; // <-- IMPORT AJOUTÉ
use App\Models\Centre;
use App\Models\Vol;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VolResource extends Resource
{
    protected static ?string $model = Vol::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    // ... (la méthode form() ne change pas) ...
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Détails du Vol')
                    ->schema([
                        Forms\Components\Select::make('centre_id')
                            ->label('Centre')
                            ->options(Centre::all()->pluck('nom_centre', 'id'))
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('indicatif')
                            ->maxLength(100),
                        Forms\Components\Select::make('flux')
                            ->enum(\App\Enums\TypeFlux::class)
                            ->options(\App\Enums\TypeFlux::class)
                            ->required(),
                        Forms\Components\Select::make('parent_vol_id')
                            ->label('Vol d\'origine (mission)')
                            ->relationship('parentVol', 'indicatif')
                            ->searchable(),
                    ])->columns(2),

                Forms\Components\Section::make('Planification')
                    ->schema([
                        Forms\Components\DatePicker::make('date_vol')
                            ->required(),
                        Forms\Components\TimePicker::make('heure_debut_prevue')
                            ->required(),
                        Forms\Components\TextInput::make('duree_prevue_secondes')
                            ->label('Durée prévue (en secondes)')
                            ->numeric()
                            ->default(0),
                    ])->columns(3),

                Forms\Components\Section::make('Réalisation (à remplir par le CDQ)')
                    ->schema([
                        Forms\Components\TimePicker::make('heure_debut_reelle'),
                        Forms\Components\TimePicker::make('heure_fin_reelle'),
                    ])->columns(2),
            ]);
    }

    // ... (la méthode table() ne change pas) ...
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_vol')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('indicatif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('centre.code_centre')
                    ->label('Centre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('flux')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('heure_debut_prevue')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('heure_fin_reelle')
                    ->time('H:i'),
                Tables\Columns\TextColumn::make('duree_reelle')
                    ->label('Durée Réelle (h)')
                    ->getStateUsing(fn (Vol $record) => number_format($record->duree_reelle, 2))
                    ->sortable(query: fn ($query, $direction) => $query->orderByRaw('heure_fin_reelle - heure_debut_reelle ' . $direction)),
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
    
    // ---> C'EST ICI LA CORRECTION <---
    public static function getRelations(): array
    {
        return [
            RelationManagers\SaisiesActivitesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVols::route('/'),
            'create' => Pages\CreateVol::route('/create'),
            'edit' => Pages\EditVol::route('/{record}/edit'),
        ];
    }
}