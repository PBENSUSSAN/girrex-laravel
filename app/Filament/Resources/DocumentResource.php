<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Models\Agent;
use App\Models\Centre;
use App\Models\Document;
use App\Models\DocumentType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $label = 'Document';
    protected static ?string $pluralLabel = 'Documents';
    protected static ?string $navigationGroup = 'Documentation';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identification')
                    ->schema([
                        Forms\Components\TextInput::make('reference')
                            ->required()->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('intitule')
                            ->required()->maxLength(255),
                        Forms\Components\Select::make('document_type_id')
                            ->label('Type de document')
                            ->options(DocumentType::all()->pluck('nom', 'id'))
                            ->required(),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                    ])->columns(3),
                Forms\Components\Section::make('Cycle de Vie & Responsabilité')
                    ->schema([
                        Forms\Components\Select::make('statut')
                            ->options(\App\Enums\StatutDocument::class)
                            ->required()->default('EN_REDACTION'),
                        Forms\Components\DatePicker::make('date_mise_en_vigueur'),
                        Forms\Components\Select::make('responsable_suivi_agent_id')
                            ->label('Responsable du suivi')
                            ->options(Agent::all()->pluck('trigram', 'id_agent'))
                            ->searchable()
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make('Contenu & Périmètre')
                    ->schema([
                        Forms\Components\FileUpload::make('fichier_pdf')
                            ->directory('documentation')
                            ->required(),
                        Forms\Components\Select::make('centres_applicables')
                            ->multiple()
                            ->relationship('centresApplicables', 'nom_centre'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('intitule')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documentType.nom')
                    ->label('Type')
                    ->sortable(),
                Tables\Columns\TextColumn::make('statut')
                    ->badge()
                    ->color(fn ($state) => match ($state->value) {
                        'EN_VIGUEUR' => 'success',
                        'EN_REDACTION' => 'warning',
                        'REMPLACE', 'ARCHIVE' => 'gray',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
            'view' => Pages\ViewDocument::route('/{record}'),
        ];
    }
}