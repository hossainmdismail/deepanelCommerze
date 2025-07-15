<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\Widgets\OrderOverview;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('customer');
    }



    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                Group::make()
                                    ->relationship('customer')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Name')
                                            ->required()
                                            ->columnSpan(1),

                                        TextInput::make('number')
                                            ->readOnly()
                                            ->label('Phone')
                                            ->columnSpan(1),
                                        TextInput::make('address')
                                            ->label('Address')
                                            ->columnSpan(2),
                                    ])->columnSpanFull()
                                    ->columns(2),
                                MarkdownEditor::make('order_notes')->columnSpanFull(),

                                Repeater::make('items')
                                    ->relationship('items')
                                    ->disableItemDeletion()
                                    ->disableItemCreation()
                                    ->label('Order Items')
                                    ->schema([
                                        Select::make('product_id')
                                            ->label('Product')
                                            ->relationship('product', 'name')
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                // Reset fields on product change
                                                $set('product_variant_id', null);
                                                $set('attributes', []);
                                                $set('price', 0);
                                                $set('attributes_display', null);
                                            })
                                            ->columnSpan(3)
                                            ->disabled()
                                            ->required(),

                                        Placeholder::make('attributes_display')
                                            ->label('Items')
                                            ->content(function (Get $get) {
                                                $json = $get('attributes');
                                                $data = json_decode($json, true);

                                                if (!is_array($data) || empty($data)) {
                                                    return 'null';
                                                }

                                                return implode(', ', array_values($data));
                                            }),


                                        TextInput::make('quantity')
                                            ->numeric()
                                            ->disabled()
                                            ->default(1)
                                            ->required(),

                                        TextInput::make('price')
                                            ->numeric()
                                            ->disabled()
                                            ->required()
                                            ->prefix('৳'),

                                    ])
                                    ->columns(6)
                                    ->defaultItems(1)
                                    ->collapsible()

                                    ->columnSpanFull(),


                            ])
                            ->columnSpan(2)
                            ->columns(2),

                        Section::make()
                            ->schema([
                                Group::make()
                                    ->schema([
                                        Select::make('status')
                                            ->options(
                                                collect(['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded'])
                                                    ->mapWithKeys(fn($status) => [$status => Str::title($status)])
                                                    ->toArray()
                                            )
                                            ->required(),
                                        TextInput::make('shipping_fee')->numeric(),
                                        TextInput::make('discount_amount')->numeric(),
                                        TextInput::make('total_amount')->numeric()->required(),
                                    ]),
                                Fieldset::make()
                                    ->schema([
                                        Placeholder::make('order_id')
                                            ->label('Order ID')
                                            ->content(function (Get $get): string {
                                                return '#' . $get('order_id');
                                            })
                                            ->columnSpanFull(),
                                        Placeholder::make('payment_method')
                                            ->label('Payment Method')
                                            ->columnSpanFull()
                                            ->content(fn(Order $record): ?string => 'COD'),
                                        Placeholder::make('created_at')
                                            ->label('Created at')
                                            ->columnSpanFull()
                                            ->content(fn(Order $record): ?string => $record->created_at?->diffForHumans()),
                                        Placeholder::make('updated_at')
                                            ->label('Last modified at')
                                            ->content(fn(Order $record): ?string => $record->updated_at?->diffForHumans()),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_id')->sortable()->searchable(),
                TextColumn::make('customer.name')->label('Customer')->sortable(),
                TextColumn::make('total_amount')->money('bdt', true),
                BadgeColumn::make('status')->colors([
                    'primary' => 'pending',
                    'warning' => 'processing',
                    'success' => 'completed',
                    'danger' => 'cancelled',
                ]),
                TextColumn::make('payment_method')->label('Payment'),
                TextColumn::make('payment_status')->label('Payment Status'),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->placeholder('All Statuses')
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
