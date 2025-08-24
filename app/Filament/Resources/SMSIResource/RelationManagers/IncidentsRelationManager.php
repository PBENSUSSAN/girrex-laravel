<?php
namespace App\Filament\Resources\SMSIResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class IncidentsRelationManager extends RelationManager
{
    protected static string $relationship = 'incidents';
    protected static ?string $title = 'Incidents Cyber';
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\DateTimePicker::make('date')->required()->default(now()),
            Forms\Components\Textarea::make('description')->required()->columnSpanFull(),
            Forms\Components\Select::make('statut')->options(\App\Enums\StatutCyberIncident::class)->required()->default('DETECTION'),
        ]);
    }
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('date')->dateTime('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}