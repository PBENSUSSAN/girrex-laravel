<?php

namespace App\Filament\Resources\BrevetResource\RelationManagers;

use App\Models\Centre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QualificationsRelationManager extends RelationManager
{
    protected static string $relationship = 'qualifications';
    protected static ?string $title = 'Qualifications & Privilèges';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('centre_id')
                    ->options(Centre::all()->pluck('nom_centre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('type_flux')
                    ->enum(\App\Enums\TypeFlux::class)
                    ->options(\App\Enums\TypeFlux::class)
                    ->required(),
                Forms\Components\Select::make('type_qualification')
                    ->enum(\App\Enums\TypeQualification::class)
                    ->options(\App\Enums\TypeQualification::class)
                    ->required(),
                Forms\Components\DatePicker::make('date_obtention')
                    ->required(),
                Forms\Components\Select::make('statut')
                    ->enum(\App\Enums\StatutQualification::class)
                    ->options(\App\Enums\StatutQualification::class)
                    ->default('ACTIF')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type_qualification')
            ->columns([
                Tables\Columns\TextColumn::make('type_qualification')->badge(),
                Tables\Columns\TextColumn::make('centre.code_centre')->label('Centre'),
                Tables\Columns\TextColumn::make('date_obtention')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
