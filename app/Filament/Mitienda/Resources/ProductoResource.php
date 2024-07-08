<?php

namespace App\Filament\Mitienda\Resources;

use App\Filament\Mitienda\Resources\ProductoResource\Pages;
use App\Filament\Mitienda\Resources\ProductoResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Nombre singular del recurso
    public static function getModelLabel(): string
    {
        return 'Producto';
    }

    // Nombre plural del recurso
    public static function getPluralModelLabel(): string
    {
        return 'Productos';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->required(),
                Forms\Components\FileUpload::make('imagen')
                    ->required()
                    ->image(),
                Forms\Components\TextInput::make('precio')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('pedido_minimo')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('categoria_id')
                    ->label('Categoria')
                    ->options(Category::all()->pluck('nombre', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('precio'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('pedido_minimo'),
                Tables\Columns\TextColumn::make('category.nombre')
                ->label('Categoria')
                ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                ->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
