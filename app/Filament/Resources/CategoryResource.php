<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Product';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $operation, $state, Set $set) {
                    $set('slug', Str::slug($state)); // applies for both create and update
                }),

            TextInput::make('slug')
                // ->disabled(fn(string $operation) => $operation === 'edit') // disable only on edit
                ->dehydrated()
                ->required()
                ->maxLength(255)
                ->unique(\App\Models\Category::class, 'slug', ignoreRecord: true),

            Forms\Components\Select::make('parent_id')
                ->relationship('parent', 'name')
                ->searchable()
                ->label('Parent Category')
                ->nullable(),
            Forms\Components\TextInput::make('icon')->nullable(),

            Forms\Components\Section::make('SEO')->schema([
                Forms\Components\TextInput::make('seo.meta_title'),
                Forms\Components\Textarea::make('seo.meta_description'),
                Forms\Components\TagsInput::make('seo.meta_keywords'),
                Forms\Components\Textarea::make('seo.json_ld')
                    ->rows(4)
                    ->label('JSON-LD (as JSON)'),
                Forms\Components\TextInput::make('seo.og_image')
                    ->label('Open Graph Image URL'),
            ])->collapsible(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('parent.name')->label('Parent'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
