<?php

namespace App\Filament\Mitienda\Resources\ProductoResource\Pages;

use App\Filament\Mitienda\Resources\ProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducto extends EditRecord
{
    protected static string $resource = ProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
