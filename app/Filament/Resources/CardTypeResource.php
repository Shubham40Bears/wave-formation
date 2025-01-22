<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CardTypeResource\Pages;
use App\Filament\Resources\CardTypeResource\RelationManagers;
use App\Models\CardType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CardTypeResource extends Resource
{
    protected static ?string $model = CardType::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Card Types';
    protected static ?string $pluralLabel = 'Card Types';
    protected static ?string $modelLabel = 'Card Type';
    protected static ?string $navigationGroup = 'Product Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Card Type')
                    ->required()
                    ->maxLength(255),

                    Forms\Components\Builder::make('fields')
                    ->label('Fields')
                    ->blocks([
                        Forms\Components\Builder\Block::make('field')
                            ->label('Field')
                            ->schema([
                                Forms\Components\TextInput::make('key')
                                    ->label('Field Key')
                                    ->required(),
                
                                Forms\Components\TextInput::make('value')
                                    ->label('Field Value'),
                            ]),
                    ])
                    ->collapsible()
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Card Type Name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCardTypes::route('/'),
            'create' => Pages\CreateCardType::route('/create'),
            'edit' => Pages\EditCardType::route('/{record}/edit'),
        ];
    }
}
