<?php
namespace App\Filament\Resources;
use App\Filament\Resources\EtudeSecuriteResource\Pages;
use App\Filament\Resources\EtudeSecuriteResource\RelationManagers;
use App\Models\EtudeSecurite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
class EtudeSecuriteResource extends Resource {
    protected static ?string $model = EtudeSecurite::class;
    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationGroup = 'Études de Sécurité';
    public static function form(Form $form): Form { return $form->schema([]); }
    public static function table(Table $table): Table {
        return $table->columns([Tables\Columns\TextColumn::make('reference_etude')])
        ->actions([Tables\Actions\EditAction::make(), Tables\Actions\ViewAction::make()])
        ->bulkActions([]);
    }
    public static function getRelations(): array {
        return [
            RelationManagers\EtapesRelationManager::class,
            RelationManagers\CommentairesRelationManager::class,
            RelationManagers\MrrsRelationManager::class,
            RelationManagers\ActionsSuiviRelationManager::class
        ];
    }
    public static function getPages(): array {
        return ['index' => Pages\ListEtudeSecurites::route('/'), 'create' => Pages\CreateEtudeSecurite::route('/create'), 'edit' => Pages\EditEtudeSecurite::route('/{record}/edit'), 'view' => Pages\ViewEtudeSecurite::route('/{record}')];
    }
}