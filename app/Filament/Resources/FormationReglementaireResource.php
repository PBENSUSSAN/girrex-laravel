<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormationReglementaireResource\Pages;
use App\Models\FormationReglementaire;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str; // Import de la classe Str

class FormationReglementaireResource extends Resource
{
    protected static ?string $model = FormationReglementaire::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Compétences';
    protected static ?string $modelLabel = 'Formation Réglementaire';
    protected static ?int $navigationSort = 4;
    protected static ?string $recordTitleAttribute = 'nom';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->label('Nom complet')
                    ->required()
                    ->maxLength(100)
                    ->live(onBlur: true) // Met à jour le champ slug en temps réel
                    ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->label('Identifiant unique (slug)')
                    ->required()
                    ->maxLength(100)
                    ->unique(FormationReglementaire::class, 'slug', ignoreRecord: true),

                Forms\Components\TextInput::make('periodicite_ans')
                    ->label('Périodicité (en années)')
                    ->required()
                    ->numeric()
                    ->default(3)
                    ->minValue(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periodicite_ans')
                    ->label('Périodicité')
                    ->suffix(' ans')
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
            'index' => Pages\ListFormationReglementaires::route('/'),
            'create' => Pages\CreateFormationReglementaire::route('/create'),
            'edit' => Pages\EditFormationReglementaire::route('/{record}/edit'),
        ];
    }
}