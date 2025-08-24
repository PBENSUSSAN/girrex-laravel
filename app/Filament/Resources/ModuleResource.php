<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ModuleResource\Pages;
use App\Models\Module;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Compétences';
    protected static ?int $navigationSort = 2;
    // --- CORRECTION 1 : On utilise une colonne qui existe comme titre ---
    protected static ?string $recordTitleAttribute = 'module';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- CORRECTION 2 : On configure le formulaire avec les VRAIS champs ---
                Forms\Components\TextInput::make('module')
                    ->label('Nom du Module')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(), // Prend toute la largeur
                Forms\Components\TextInput::make('id_module')
                    ->label('ID Module')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('module_type')
                    ->maxLength(100),
                Forms\Components\TextInput::make('item')
                    ->maxLength(255),
                Forms\Components\TextInput::make('numero')
                    ->maxLength(50),
                Forms\Components\DatePicker::make('date'),
                Forms\Components\DatePicker::make('validite')
                    ->label('Date de validité'),
                Forms\Components\TextInput::make('support')
                    ->maxLength(50),
                Forms\Components\Textarea::make('sujet')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('precisions')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // --- CORRECTION 3 : On affiche les colonnes pertinentes ---
                Tables\Columns\TextColumn::make('module')
                    ->label('Module')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('module_type')
                    ->label('Type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero'),
                Tables\Columns\TextColumn::make('date')
                    ->date('d/m/Y')
                    ->sortable(),
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
            'index' => Pages\ListModules::route('/'),
            'create' => Pages\CreateModule::route('/create'),
            'edit' => Pages\EditModule::route('/{record}/edit'),
        ];
    }
}