<?php
namespace App\Filament\Resources;

use App\Filament\Resources\OrganismeResource\Pages;
use App\Models\Organisme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrganismeResource extends Resource
{
    protected static ?string $model = Organisme::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationGroup = 'Compétences';
    // --- CORRECTION 1 ---
    // Le titre de l'enregistrement est la colonne 'nom_organisme'
    protected static ?string $recordTitleAttribute = 'nom_organisme';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // --- CORRECTION 2 ---
            // On met à jour le formulaire pour inclure tous les champs
            Forms\Components\TextInput::make('nom_organisme')
                ->label("Nom de l'organisme") // Un label plus clair
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('type_organisme')
                ->label("Type d'organisme")
                ->maxLength(100),
            Forms\Components\TextInput::make('agrement')
                ->label("Agrément")
                ->maxLength(100),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            // --- CORRECTION 3 ---
            // On met à jour la table pour afficher les bonnes colonnes
            Tables\Columns\TextColumn::make('nom_organisme')->label("Nom")->searchable()->sortable(),
            Tables\Columns\TextColumn::make('type_organisme')->label("Type")->searchable(),
            Tables\Columns\TextColumn::make('agrement')->searchable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(), // C'est bien d'avoir l'action de suppression
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
            'index' => Pages\ListOrganismes::route('/'),
            'create' => Pages\CreateOrganisme::route('/create'),
            'edit' => Pages\EditOrganisme::route('/{record}/edit'),
        ];
    }
}