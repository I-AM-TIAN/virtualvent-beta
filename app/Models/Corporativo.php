<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'razon_social',
        'email',
        'telefono',
    ];

    public function ubicacion()
    {
        return $this->hasOne(Ubicacion::class);
    }
}
