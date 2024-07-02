<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporativo_id',
        'departamento_id',
        'ciudad_id',
        'nombre',
    ];

    public function corporativo()
    {
        return $this->belongsTo(Corporativo::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}
