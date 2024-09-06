<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Title')
                ->required()
                ->columnSpan(2)
                ->maxLength(255),
                Forms\Components\Select::make('Category')
                    ->options([
                        'Electronics' => 'Electronics',
                        'Clothing' => 'Clothing',
                        'Books' => 'Books',
                        'Toys' => 'Toys',
                        'Food' => 'Food',
                    ]),
                    Forms\Components\Select::make('Brand')
                    ->options([
                        'Apple' => 'Apple',
                        'Samsung' => 'Samsung',
                        'Sony' => 'Sony',
                        'Xiaomi' => 'Xiaomi',
                        'Huawei' => 'Huawei',
                    ]),
                Forms\Components\RichEditor::make('content')
                    ->columnSpan(2),
                Forms\Components\FileUpload::make('attachment')
                    ->multiple(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
