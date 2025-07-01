<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Attribute;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\AttributeResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Set;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationGroup = 'Product';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation !== 'create') return;
                        $set('slug', Str::slug($state));
                    }),

                TextInput::make('slug')
                    // ->disabled(fn(string $operation) => $operation === 'edit') // disable only on edit
                    ->dehydrated()
                    ->required()
                    ->maxLength(255)
                    ->unique(\App\Models\Attribute::class, 'slug', ignoreRecord: true),

                Select::make('type')
                    ->options([
                        'text' => 'Text (e.g., S, M, L)',
                        'color' => 'Color (e.g., #FF0000)',
                        'image' => 'Image (URL or upload)',
                    ])
                    ->default('text')
                    ->required(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Repeater::make('values')
                    ->relationship()
                    ->label('Attribute Values')
                    ->schema([
                        TextInput::make('value')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                if ($operation !== 'create') return;
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            // ->disabled(fn(string $operation) => $operation === 'edit') // disable only on edit
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(\App\Models\AttributeValue::class, 'slug', ignoreRecord: true),

                        TextInput::make('meta')
                            ->label('Meta (Color code, image URL, etc.)')
                            ->placeholder('#FF0000 or https://...')
                            ->helperText('Optional: depends on attribute type'),
                    ])
                    ->columns(1)
                    ->createItemButtonLabel('Add Value'),

                Toggle::make('is_enabled')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),

                TextColumn::make('type')->badge(),

                TagsColumn::make('values')
                    ->label('Values')
                    ->getStateUsing(fn($record) => $record->values->pluck('value')->toArray()),

                // TextColumn::make('sort_order')->sortable(),

                ToggleColumn::make('is_enabled')
                    ->label('Active'),
            ])
            ->defaultSort('id', 'desc')
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
            'index' => Pages\ListAttributes::route('/'),
            'create' => Pages\CreateAttribute::route('/create'),
            'edit' => Pages\EditAttribute::route('/{record}/edit'),
        ];
    }
}
