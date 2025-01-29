<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Orders Management';
    protected static ?string $label = 'Order';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('order_id')
                ->label('Order ID')
                ->disabled(), // Make it read-only
                BelongsToSelect::make('user_id')
                ->relationship('user', 'name') // Assumes `name` exists on the User model
                ->label('User')
                ->disabled(), // Read-only
            
            BelongsToSelect::make('product_id')
                ->relationship('product', 'name') // Assumes `name` exists on the Product model
                ->label('Product')
                ->disabled(), // Read-only
            TextInput::make('amount')
                ->label('Amount')
                ->disabled(), // Make it read-only
            TextInput::make('created_at')
                ->label('Created At')
                ->disabled(), // Make it read-only
            TextInput::make('updated_at')
                ->label('Updated At')
                ->disabled(), // Make it read-only
            Select::make('status')
                ->label('Status')
                ->options([
                    Order::STATUS_PROCESSING => 'Processing',
                    Order::STATUS_PACKED => 'Packed',
                    Order::STATUS_SHIPPED => 'Shipped',
                    Order::STATUS_DELIVERY => 'Out for Delivery',
                    Order::STATUS_CANCELLED => 'Cancelled',
                    Order::STATUS_FAILED => 'Failed',
                ])
                ->required(), // Only this field is editable
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_id')->label('Order ID')->sortable()->searchable(),
                TextColumn::make('user.name')->label('User')->sortable()->searchable(),
                TextColumn::make('product.name')->label('Product')->sortable()->searchable(),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => Order::STATUS_PROCESSING,
                        'warning' => Order::STATUS_PACKED,
                        'success' => [Order::STATUS_SHIPPED, Order::STATUS_DELIVERY],
                        'danger' => [Order::STATUS_CANCELLED, Order::STATUS_FAILED],
                    ])
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            Order::STATUS_PROCESSING => 'Processing',
                            Order::STATUS_PACKED => 'Packed',
                            Order::STATUS_SHIPPED => 'Shipped',
                            Order::STATUS_DELIVERY => 'Out for Delivery',
                            Order::STATUS_CANCELLED => 'Cancelled',
                            Order::STATUS_FAILED => 'Failed',
                            default => 'Unknown',
                        };
                    }),
                TextColumn::make('amount')->label('Amount')->sortable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
                TextColumn::make('updated_at')->label('Updated At')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        Order::STATUS_PROCESSING => 'Processing',
                        Order::STATUS_PACKED => 'Packed',
                        Order::STATUS_SHIPPED => 'Shipped',
                        Order::STATUS_DELIVERY => 'Out for Delivery',
                        Order::STATUS_CANCELLED => 'Cancelled',
                        Order::STATUS_FAILED => 'Failed',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('generateProfile')
                ->label('Generate Profile')
                ->icon('heroicon-o-cog')
                ->action(function ($record) {
                    // Add logic to generate the profile here
                    // For example:
                    $response = app()->call('App\Http\Controllers\OrderController@generateVcfProfile', [
                        'orderId' => $record->id,
                    ]);
                    if ($response['success']) {
                        Notification::make()
                            ->title('VCF Profile generated successfully!')
                            ->success()
                            ->send();
                    } else {
                        Notification::make()
                            ->title('Failed to generate profile.')
                            ->danger()
                            ->send();
                    }
                }),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
