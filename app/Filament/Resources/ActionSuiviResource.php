<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActionSuiviResource\Pages;
use App\Models\ActionSuivi;
use App\Models\Agent;
use App\Models\Centre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ActionSuiviResource extends Resource
{
    protected static ?string $model = ActionSuivi::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $label = 'Action de Suivi';
    protected static ?string $pluralLabel = 'Actions de Suivi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titre')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('responsable_agent_id')
                    ->label('Responsable')
                    ->options(Agent::all()->pluck('trigram', 'id_agent'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('categorie')
                    ->options(\App\Enums\CategorieAction::class)
                    ->required(),
                Forms\Components\DatePicker::make('echeance')
                    ->required(),
                Forms\Components\Select::make('priorite')
                    ->options(\App\Enums\PrioriteAction::class)
                    ->required(),
                Forms\Components\Select::make('statut')
                    ->options(\App\Enums\StatutAction::class)
                    ->required()
                    ->default('A_FAIRE'),
                Forms\Components\Select::make('centres')
                    ->label('Centres Concernés')
                    ->multiple()
                    ->relationship('centres', 'nom_centre'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('responsable.trigram')
                    ->label('Resp.')
                    ->sortable(),
                Tables\Columns\TextColumn::make('statut')
                    ->badge(),
                Tables\Columns\TextColumn::make('echeance')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('priorite')
                    ->badge()
                    ->color(fn ($state) => match ($state->value) {
                        'BASSE' => 'gray',
                        'MOYENNE' => 'info',
                        'HAUTE' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('echeance', 'asc')
            ->filters([
                //
            ])
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
            'index' => Pages\ListActionSuivis::route('/'),
            'create' => Pages\CreateActionSuivi::route('/create'),
            'edit' => Pages\EditActionSuivi::route('/{record}/edit'),
            'view' => Pages\ViewActionSuivi::route('/{record}'),
        ];
    }
}