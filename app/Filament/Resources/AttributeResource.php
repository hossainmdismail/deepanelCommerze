<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Attribute;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AttributeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AttributeResource\RelationManagers;
use Filament\Tables\Columns\TextColumn;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                // Shopify-style value adder
                Repeater::make('values')
                    ->relationship()
                    ->schema([
                        TextInput::make('value')->required(),
                    ])
                    ->label('Attribute Values')
                    ->createItemButtonLabel('Add Value')
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('slug')->searchable(),

                // Show comma-separated values
                TextColumn::make('values')
                    ->label('Values')
                    ->getStateUsing(
                        fn($record) =>
                        $record->values->pluck('value')->implode(', ')
                    )
                    ->limit(50), // optional: limit long text
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
