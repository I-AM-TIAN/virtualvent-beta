<?php

namespace App\Filament\Mitienda\Resources;

use App\Filament\Mitienda\Resources\PedidoResource\Pages;
use App\Filament\Mitienda\Resources\PedidoResource\RelationManagers;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PedidoResource extends Resource
{
    protected static ?string $model = Pedido::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cantidad'),
                Forms\Components\DatePicker::make('fecha_entrega'),
                Forms\Components\Select::make('producto_id')
                    ->label('Producto')
                    ->options(Product::all()->pluck('nombre', 'id'))
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('Cliente')
                    ->options(Cliente::all()->pluck('primer_nombre', 'id'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.primer_nombre'),
                Tables\Columns\TextColumn::make('producto.nombre'),
                Tables\Columns\TextColumn::make('estado.nombre'),
                Tables\Columns\TextColumn::make('cantidad'),
                Tables\Columns\TextColumn::make('fecha_entrega'),
                Tables\Columns\TextColumn::make('created_at'),
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
            'index' => Pages\ListPedidos::route('/'),
            'create' => Pages\CreatePedido::route('/create'),
            'edit' => Pages\EditPedido::route('/{record}/edit'),
        ];
    }
}
