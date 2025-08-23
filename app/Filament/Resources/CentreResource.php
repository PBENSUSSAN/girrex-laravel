<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CentreResource\Pages;
use App\Models\Centre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CentreResource extends Resource
{
    protected static ?string $model = Centre::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom_centre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code_centre')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('nombre_cabines')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\Toggle::make('gere_aps')
                    ->required(),
                Forms\Components\Toggle::make('gere_tour')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code_centre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nom_centre')
                    ->searchable(),
                Tables\Columns\IconColumn::make('gere_aps')
                    ->boolean(),
                Tables\Columns\IconColumn::make('gere_tour')
                    ->boolean(),
                Tables\Columns\TextColumn::make('nombre_cabines'),
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
            'index' => Pages\ListCentres::route('/'),
            'create' => Pages\CreateCentre::route('/create'),
            'edit' => Pages\EditCentre::route('/{record}/edit'),
        ];
    }
}