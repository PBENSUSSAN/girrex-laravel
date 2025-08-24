<?php
namespace App\Filament\Resources\SMSIResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class RisquesRelationManager extends RelationManager
{
    protected static string $relationship = 'risques';
    protected static ?string $title = 'Risques Cyber';
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('description')->required()->columnSpanFull(),
            Forms\Components\Select::make('gravite')->options(\App\Enums\GraviteCyberRisque::class)->required(),
            Forms\Components\Select::make('probabilite')->options(\App\Enums\ProbabiliteCyberRisque::class)->required(),
            Forms\Components\Select::make('statut')->options(\App\Enums\StatutCyberRisque::class)->required()->default('OUVERT'),
        ]);
    }
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('gravite')->badge(),
                Tables\Columns\TextColumn::make('probabilite')->badge(),
                Tables\Columns\TextColumn::make('statut')->badge(),
            ])
            ->headerActions([Tables\Actions\CreateAction::make()])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }
}