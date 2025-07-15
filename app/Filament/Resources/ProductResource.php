<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use App\Models\Attribute;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\AttributeValue;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Validation\ValidationException;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
        protected static ?string $navigationGroup = 'Product';
    protected static ?int $navigationSort = 1;

    public static function booted()
    {
        static::saving(function ($variant) {
            $attrIds = $variant->attributeValues->pluck('attribute_id');
            if ($attrIds->count() !== $attrIds->unique()->count()) {
                throw ValidationException::withMessages([
                    'attributeValues' => 'You cannot select the same attribute multiple times.',
                ]);
            }
        });
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Basic Info')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') return;
                                        $set('slug', Str::slug($state));
                                    })->columnSpan(2),

                                TextInput::make('slug')
                                    // ->disabled(fn(string $operation) => $operation === 'edit') // disable only on edit
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(\App\Models\Product::class, 'slug', ignoreRecord: true)
                                    ->columnSpan(1),
                                Select::make('categories')
                                    ->multiple()
                                    ->relationship('categories', 'name') // 'name' is the field from Category
                                    ->preload()
                                    ->required()
                                    ->columnSpan(1),
                                MarkdownEditor::make('description')
                                    ->columnSpan(2),
                            ])->columns(2),

                        Section::make('Variants')
                            ->visible(fn(Forms\Get $get) => $get('is_variant_based') === true)
                            ->schema([
                                Repeater::make('variants')
                                    ->relationship('variants')
                                    ->label('Product Variants')
                                    ->collapsible()
                                    ->itemLabel(fn($state) => $state['sku'] ?? null)
                                    ->schema([
                                        TextInput::make('sku')->required(),
                                        TextInput::make('price')->numeric()->required(),
                                        TextInput::make('stock')->numeric()->required(),
                                        FileUpload::make('image')->image()->directory('products/variants'),
                                        Repeater::make('attributes')
                                            ->label('Attributes')
                                            ->statePath('attribute_snapshot')
                                            ->default([])
                                            ->schema([
                                                Select::make('attribute_id')
                                                    ->label('Attribute')
                                                    ->options(fn() => \App\Models\Attribute::pluck('name', 'id'))
                                                    ->required()
                                                    ->reactive()
                                                    ->afterStateUpdated(fn($state, Forms\Set $set) => $set('attribute_value_id', null)),

                                                Select::make('attribute_value_id')
                                                    ->label('Value')
                                                    ->options(
                                                        fn(Forms\Get $get) =>
                                                        \App\Models\AttributeValue::where('attribute_id', $get('attribute_id'))
                                                            ->pluck('value', 'id')
                                                    )
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->rules([
                                                function () {
                                                    return function (string $attribute, $value, \Closure $fail) {
                                                        $attributeIds = collect($value)->pluck('attribute_id');
                                                        if ($attributeIds->count() !== $attributeIds->unique()->count()) {
                                                            $fail('You cannot use the same attribute multiple times in a single variant.');
                                                        }
                                                    };
                                                }
                                            ])


                                    ])
                                    ->afterStateHydrated(function ($state, Forms\Set $set) {
                                        // Optional: preload values later
                                    })
                                    ->dehydrateStateUsing(function ($state) {
                                        // Save the snapshot directly into DB
                                        $state['attribute_snapshot'] = $state['attributes'] ?? [];
                                        return $state;
                                    })
                            ])
                    ])->columnSpan(2),
                Group::make()
                    ->schema([
                        Section::make('Product Settings')
                            ->schema([
                                Toggle::make('is_variant_based')
                                    ->label('Enable Variants')
                                    ->helperText('This product will be hidden from all sales channels.')
                                    ->default(false)
                                    ->live(),

                                TextInput::make('base_price')
                                    ->numeric()
                                    ->visible(fn(Forms\Get $get) => $get('is_variant_based') === false),

                                TextInput::make('stock')
                                    ->numeric()
                                    ->visible(fn(Forms\Get $get) => $get('is_variant_based') === false),

                                Select::make('status')
                                    ->options([
                                        'published' => 'Published',
                                        'draft' => 'Draft',
                                        'archived' => 'Archived',
                                    ])
                                    ->default('draft'),
                            ]),

                        Section::make('Media')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->imageEditor()
                                    ->disk('public')
                                    ->directory('products/thumbnails')
                                    ->previewable()
                                    ->maxSize(1024),
                            ])
                    ])->columnSpan(1)

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('slug')->toggleable(),
                TextColumn::make('base_price')->money('USD')->sortable(),
                TextColumn::make('stock')->sortable(),
                TextColumn::make('status')->badge(),
                IconColumn::make('is_variant_based')->boolean(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
