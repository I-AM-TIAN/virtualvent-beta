<?php

namespace App\Filament\Mitienda\Resources\PedidoResource\Pages;

use App\Filament\Mitienda\Resources\PedidoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPedidos extends ListRecords
{
    protected static string $resource = PedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
