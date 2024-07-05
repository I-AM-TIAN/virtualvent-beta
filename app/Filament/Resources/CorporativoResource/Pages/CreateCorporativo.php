<?php

namespace App\Filament\Resources\CorporativoResource\Pages;

use App\Filament\Resources\CorporativoResource;
use App\Models\Corporativo;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateCorporativo extends CreateRecord
{
    protected static string $resource = CorporativoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();
        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Crear usuario
        $password = Str::random(12);
        $user = User::create([
            'name' => $data['razon_social'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'tipo_usuario_id' => 2, // Tipo de usuario corporativo
        ]);

        // Crear el corporativo y asignar el user_id del usuario creado
        $corporativo = Corporativo::create(array_merge($data, ['user_id' => $user->id]));

        // Crear la ubicación asociada al corporativo
        $corporativo->ubicacion()->create($data['ubicacion']);

        // Enviar correo electrónico con las credenciales
        Mail::to($data['email'])->send(new \App\Mail\CorporateCredentialsMail($user->email, $password));

        return $corporativo;
    }
}
