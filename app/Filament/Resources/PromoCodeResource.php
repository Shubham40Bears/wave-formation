<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoCodeResource\Pages;
use App\Filament\Resources\PromoCodeResource\RelationManagers;
use App\Models\PromoCode;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromoCodeResource extends Resource
{
    protected static ?string $model = PromoCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationGroup = 'Marketing';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')
                    ->label('Promo Code')
                    ->unique()
                    ->required(),

                TextInput::make('discount')
                    ->label('Discount Value')
                    ->numeric()
                    ->required(),

                Select::make('discount_type')
                    ->label('Discount Type')
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed Amount',
                    ])
                    ->default('fixed')
                    ->required(),

                TextInput::make('usage_limit')
                    ->label('Usage Limit')
                    ->numeric()
                    ->default(1)
                    ->required(),

                TextInput::make('used_count')
                    ->label('Used Count')
                    ->numeric()
                    ->default(0)
                    ->disabled(),

                DateTimePicker::make('expires_at')
                    ->label('Expiration Date')
                    ->nullable(),

                Toggle::make('is_active')
                    ->label('Is Active?')
                    ->default(true),

                Placeholder::make('created_at')
                    ->label('Created At')
                    ->content(fn ($record) => $record?->created_at?->diffForHumans() ?? 'Not available'),

                Placeholder::make('updated_at')
                    ->label('Updated At')
                    ->content(fn ($record) => $record?->updated_at?->diffForHumans() ?? 'Not available'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Promo Code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('discount')
                    ->label('Discount Value')
                    ->sortable(),

                TextColumn::make('discount_type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('usage_limit')
                    ->label('Limit')
                    ->sortable(),

                TextColumn::make('used_count')
                    ->label('Used')
                    ->sortable(),

                BooleanColumn::make('is_active')
                    ->label('Active'),

                TextColumn::make('expires_at')
                    ->label('Expires At')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('is_active')
                    ->label('Active Promo Codes')
                    ->query(fn ($query) => $query->where('is_active', true)),

                Filter::make('expired')
                    ->label('Expired Promo Codes')
                    ->query(fn ($query) => $query->where('expires_at', '<', now())),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('markAsUsed')
                    ->label('Mark as Used')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->action(fn (PromoCode $record) => $record->increment('used_count'))
                    ->visible(fn (PromoCode $record) => $record->used_count < $record->usage_limit),
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
            'index' => Pages\ListPromoCodes::route('/'),
            'create' => Pages\CreatePromoCode::route('/create'),
            'edit' => Pages\EditPromoCode::route('/{record}/edit'),
        ];
    }
}
