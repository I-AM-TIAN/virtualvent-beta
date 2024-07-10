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
        'created_by',
        'user_id',
        'logo',
    ];

    public function ubicacion()
    {
        return $this->hasOne(Ubicacion::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
