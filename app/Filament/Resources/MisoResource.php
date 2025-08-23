<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MisoResource\Pages;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\Miso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MisoResource extends Resource
{
    protected static ?string $model = Miso::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $label = 'Préavis MISO';
    protected static ?string $pluralLabel = 'Préavis MISO';
    protected static ?string $navigationGroup = 'Technique';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('responsable_id')
                    ->label('Responsable ES')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('centre_id')
                    ->label('Centre concerné')
                    ->options(Centre::all()->pluck('nom_centre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\DateTimePicker::make('date_debut')
                    ->required(),
                Forms\Components\DateTimePicker::make('date_fin')
                    ->required(),
                Forms\Components\Select::make('type_maintenance')
                    ->options(\App\Enums\TypeMaintenance::class)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\FileUpload::make('piece_jointe')
                    ->directory('miso-attachments'),
                Forms\Components\Select::make('statut_override')
                    ->label('Statut manuel (pour annulation)')
                    ->options(\App\Enums\StatutMiso::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_debut')
                    ->label('Début')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('centre.code_centre')
                    ->label('Centre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_maintenance')
                    ->badge(),
                Tables\Columns\TextColumn::make('responsable.trigram')
                    ->label('Resp.'),
                Tables\Columns\TextColumn::make('statut_override')
                    ->label('Statut')
                    ->badge()
                    ->color('danger')
                    ->formatStateUsing(fn ($state) => $state ? $state->value : 'Actif'), // Affiche 'Actif' si null
            ])
            ->defaultSort('date_debut', 'desc')
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
            'index' => Pages\ListMisos::route('/'),
            'create' => Pages\CreateMiso::route('/create'),
            'view' => Pages\ViewMiso::route('/{record}'),
            'edit' => Pages\EditMiso::route('/{record}/edit'),
        ];
    }
}