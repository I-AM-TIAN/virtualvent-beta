<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =[
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'numero_documento',
        'sexo',
        'fecha_nacimiento',
        'telefono',
        'email',
        'tipo_documento_id',
        'ubicacion_id',
        'user_id',
    ];
}
