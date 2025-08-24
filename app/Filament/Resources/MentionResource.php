<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MentionResource\Pages;
use App\Filament\Resources\MentionResource\RelationManagers;
use App\Models\Mention;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MentionResource extends Resource
{
    protected static ?string $model = Mention::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('licence_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type_mention')
                    ->required(),
                Forms\Components\DatePicker::make('date_obtention')
                    ->required(),
                Forms\Components\DatePicker::make('date_validite'),
                Forms\Components\TextInput::make('statut')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('licence_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_mention')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_obtention')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_validite')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statut')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMentions::route('/'),
            'create' => Pages\CreateMention::route('/create'),
            'edit' => Pages\EditMention::route('/{record}/edit'),
        ];
    }
}
