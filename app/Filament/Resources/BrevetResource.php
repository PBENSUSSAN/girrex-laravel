<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrevetResource\Pages;
use App\Filament\Resources\BrevetResource\RelationManagers;
use App\Models\Brevet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrevetResource extends Resource
{
    protected static ?string $model = Brevet::class;

    // On cache cet élément du menu principal car on y accède via la fiche Agent
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        // Le formulaire est géré par le RelationManager sur la page Agent
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        // La table est gérée par le RelationManager sur la page Agent
        return $table
            ->columns([
                //
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
            'edit' => Pages\EditBrevet::route('/{record}/edit'),
        ];
    }
}