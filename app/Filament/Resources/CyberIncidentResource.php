<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CyberIncidentResource\Pages;
use App\Models\CyberIncident;
use App\Models\SMSI; // IMPORTANT : Assurez-vous que cette ligne est bien présente
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CyberIncidentResource extends Resource
{
    protected static ?string $model = CyberIncident::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationGroup = 'Cybersécurité';
    protected static ?int $navigationSort = 3;
    protected static ?string $recordTitleAttribute = 'description';
    protected static ?string $modelLabel = 'Cyber Incident';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('smsi_id')
                    // --- CORRECTION FINALE ICI ---
                    // On utilise 'options' pour construire la liste en utilisant la bonne colonne 'nom_centre'
                    ->options(
                        SMSI::with('centre')->get()->pluck('centre.nom_centre', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('SMSI (Centre)'),
                Forms\Components\DateTimePicker::make('date')
                    ->required()
                    ->default(now()),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('statut')
                    ->options(\App\Enums\StatutCyberIncident::class)
                    ->required()
                    ->default('DETECTION'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // --- CORRECTION FINALE ICI ---
                Tables\Columns\TextColumn::make('smsi.centre.nom_centre')->label('Centre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('date')->dateTime('d/m/Y H:i')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCyberIncidents::route('/'),
            'create' => Pages\CreateCyberIncident::route('/create'),
            'view' => Pages\ViewCyberIncident::route('/{record}'),
            'edit' => Pages\EditCyberIncident::route('/{record}/edit'),
        ];
    }
}