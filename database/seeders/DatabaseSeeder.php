<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ciudad;
use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Tipo_Documento;
use App\Models\tipoUsuario;
use App\Models\Ubicacion;
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

        tipoUsuario::create([
            'codigo' => '3',
            'detalle' => 'Cliente'
        ]);

        Tipo_Documento::create([
            'codigo' => '1',
            'nombre' => 'Cédula'
        ]);

        Tipo_Documento::create([
            'codigo' => '2',
            'nombre' => 'Tarjeta de identidad'
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

        Ubicacion::create([
            'departamento_id' => 1,
            'ciudad_id' => 1,
            'nombre' => 'CLL 99 #99 - 9',
        ]);

        User::create([
            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => 'adminvirtu@l',
            'tipo_usuario_id' => '1'
        ]);

        User::create([
            'name' => 'PruebaCliente',
            'email' => 'prueba@prueba.com',
            'password' => 'prueb@',
            'tipo_usuario_id' => '3'
        ]);

        Cliente::create([
            'primer_nombre' => 'Usuario',
            'primer_apellido' => 'Prueba',
            'segundo_apellido' => 'Prueba',
            'numero_documento' => '12312312321',
            'sexo' => 'M',
            'fecha_nacimiento' => '2001-01-01',
            'telefono' => '3233333333',
            'email' => 'prueba@prueba.com',
            'tipo_documento_id' => '1',
            'ubicacion_id' => '1',
            'user_id' => '2'
        ]);

        Category::create([
            'nombre' => 'Limpieza',
            'descripcion' => 'Productos de limpieza',
        ]);
    }
}
