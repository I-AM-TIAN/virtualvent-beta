<?php

namespace App\Filament\Resources\CorporativoResource\Pages;

use App\Filament\Resources\CorporativoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCorporativos extends ListRecords
{
    protected static string $resource = CorporativoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
