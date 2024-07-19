<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\tipoUsuario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Crear valores iniciales necesarios en la base de datos

        tipoUsuario::create([
            'codigo' => '1',
            'detalle' => 'Super usuario'
        ]);

        tipoUsuario::create([
            'codigo' => '2',
            'detalle' => 'Corporativo'
        ]);

        User::create([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => 'adminvirtu@l',
            'tipo_usuario_id' => '1'
        ]);

        Departamento::create([
            'nombre' => 'Córdoba'
        ]);

        Ciudad::create([
            'nombre' => 'Montería',
            'departamento_id' => '1'
        ]);

        Ciudad::create([
            'nombre' => 'Ciénaga de oro',
            'departamento_id' => '1'
        ]);
    }
}
