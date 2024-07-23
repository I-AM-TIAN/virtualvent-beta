<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Category;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $categoria = Category::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'creadopor' => auth()->id(),
        ]);

        return $categoria;
    }
    
}
