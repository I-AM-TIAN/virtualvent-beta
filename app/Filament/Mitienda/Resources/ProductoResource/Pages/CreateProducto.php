<?php

namespace App\Filament\Mitienda\Resources\ProductoResource\Pages;

use App\Filament\Mitienda\Resources\ProductoResource;
use App\Models\Corporativo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProducto extends CreateRecord
{
    protected static string $resource = ProductoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Verificar si el usuario está autenticado y es del tipo que tiene un corporativo asignado
        if ($user && $user->tipo_usuario_id == 2) {
            // Obtener el corporativo asociado al usuario
            $corporativo = $user->corporativo;

            // Verificar si el usuario tiene un corporativo asignado
            if ($corporativo) {
                // Asignar el ID del corporativo a la columna 'corporativo_id'
                $data['corporativo_id'] = $corporativo->id;
            } else {
                abort(403, 'User does not have a corporativo assigned.');
            }
        } else {
            abort(403, 'User is not authorized to perform this action.');
        }

        return $data;
    }
}
