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

    protected function handleRecordCreation(array $data): Model
    {
        $corporativo = Corporativo::create($data);

        $corporativo->ubicacion()->create($data['ubicacion']);

        // Crear usuario
        $password = Str::random(12);
        $user = User::create([
            'name' => $data['razon_social'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'tipo_usuario_id' => 2, // Tipo de usuario corporativo
        ]);

        // Enviar correo electrónico con las credenciales
        Mail::to($data['email'])->send(new \App\Mail\CorporateCredentialsMail($user->email, $password));

        return $corporativo;
    }
}
