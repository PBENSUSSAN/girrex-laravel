<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentionLinguistiqueResource\Pages;
use App\Models\MentionLinguistique;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MentionLinguistiqueResource extends Resource
{
    protected static ?string $model = MentionLinguistique::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';
    protected static ?string $navigationGroup = 'Compétences';
    protected static ?string $modelLabel = 'Mention Linguistique';
    protected static ?int $navigationSort = 7; // Pour le placer à la fin

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('brevet_id')
                    ->relationship('brevet', 'numero_brevet')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Brevet'),
                
                Forms\Components\Select::make('langue')
                    ->options([
                        'ANGLAIS' => 'Anglais',
                        'FRANCAIS' => 'Français',
                    ])
                    ->required(),

                Forms\Components\Select::make('niveau_oaci')
                    ->label('Niveau OACI')
                    ->options([
                        4 => 'Niveau 4',
                        5 => 'Niveau 5',
                        6 => 'Niveau 6',
                    ])
                    ->required(),
                    
                Forms\Components\DatePicker::make('date_evaluation')
                    ->label('Date d\'évaluation')
                    ->required(),

                Forms\Components\DatePicker::make('date_echeance')
                    ->label('Date d\'échéance')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brevet.agent.nom_complet')
                    ->label('Agent')
                    ->searchable(['nom', 'prenom'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('brevet.numero_brevet')
                    ->label('Brevet N°')
                    ->searchable(),
                Tables\Columns\TextColumn::make('langue')
                    ->badge(),
                Tables\Columns\TextColumn::make('niveau_oaci')
                    ->label('Niveau')
                    ->badge(),
                Tables\Columns\TextColumn::make('date_echeance')
                    ->label('Échéance')
                    ->date('d/m/Y')
                    ->sortable()
                    ->color(fn ($state) => $state->isPast() ? 'danger' : 'success'),
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
            'index' => Pages\ListMentionLinguistiques::route('/'),
            'create' => Pages\CreateMentionLinguistique::route('/create'),
            'edit' => Pages\EditMentionLinguistique::route('/{record}/edit'),
        ];
    }
}