<?php

namespace App\Filament\Mitienda\Resources\PedidoResource\Pages;

use App\Filament\Mitienda\Resources\PedidoResource;
use App\Models\Pedido;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePedido extends CreateRecord
{
    protected static string $resource = PedidoResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $pedido = Pedido::create([
            'cantidad' => $data['cantidad'],
            'fecha_entrega' => $data['fecha_entrega'],
            'numero_pedido' => 'AAAA111',
            'estado_id' => 1,
            'producto_id' => $data['producto_id'],
            'cliente_id' => $data['cliente_id'],
        ]);

        return $pedido;
    }
}
