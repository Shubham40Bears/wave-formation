<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Cloudinary\Cloudinary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('regular_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('sales_price')
                    ->nullable()
                    ->numeric(),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('card_type_id')
                    ->label('Card Type')
                    ->relationship('cardType', 'name') // Load CardType relationship and display its name
                    ->searchable()
                    ->nullable(),
                Forms\Components\Textarea::make('description')->nullable(),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('images')
                    ->label('Product Images')
                    ->multiple() // Allow multiple images
                    ->image() // Restrict to image files
                    ->maxSize(2048) // Max size in KB
                    ->disk('cloudinary')
                    ->required(),
                Forms\Components\FileUpload::make('card_skeleton')
                    ->label('Skeleton Image')
                    ->image() // Restrict to image files
                    ->maxSize(2048) // Max size in KB
                    ->disk('cloudinary')
                    ->required(),
                Forms\Components\FileUpload::make('choice_images')
                    ->label('Choice Images')
                    ->multiple()
                    ->image()
                    ->maxSize(2048)
                    ->disk('cloudinary'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('regular_price')->label('Regular Price')->money('inr', true),
                Tables\Columns\TextColumn::make('sales_price')->label('Sales Price')->money('inr', true),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable(),
                Tables\Columns\TextColumn::make('cardType.name')->label('Type')->sortable(),
                Tables\Columns\ImageColumn::make('images.0') // Display the first image
                                            ->label('Image')
                                            ->size(50)
                                            ->getStateUsing(function ($record) {
                                                // Ensure the URL is prefixed with the Cloudinary base URL
                                                $cloudinaryBaseUrl = 'https://res.cloudinary.com/shubhambhattacharya/image/upload/';
                                                $imagePath = $record->images[0] ?? null; // Get the first image path
                                                
                                                // Return the full Cloudinary URL
                                                return $imagePath ? $cloudinaryBaseUrl . $imagePath : null;
                                            }),
                Tables\Columns\TextColumn::make('stock')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->date(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated')->date(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
