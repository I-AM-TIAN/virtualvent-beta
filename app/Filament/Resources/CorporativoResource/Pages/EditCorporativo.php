<?php

namespace App\Filament\Resources\CorporativoResource\Pages;

use App\Filament\Resources\CorporativoResource;
use Filament\Resources\Pages\EditRecord;

class EditCorporativo extends EditRecord
{
    protected static string $resource = CorporativoResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->ubicacion()->updateOrCreate(
            ['corporativo_id' => $this->record->id],
            $data['ubicacion']
        );

        return $data;
    }
}
