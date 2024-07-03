<?php

namespace App\Filament\Resources\CorporativoResource\Pages;

use App\Filament\Resources\CorporativoResource;
use Filament\Resources\Pages\EditRecord;

class EditCorporativo extends EditRecord
{
    protected static string $resource = CorporativoResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }

    protected function afterSave(): void
    {
        $this->record->ubicacion()->updateOrCreate(
            ['corporativo_id' => $this->record->id],
            $this->data['ubicacions']
        );
    }
}
