<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cocur\Slugify\Slugify;

class Corporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'razon_social',
        'email',
        'telefono',
        'ubicacion_id',
        'created_by',
        'user_id',
        'logo',
        'descripcion',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($corporativo) {
            $slugify = new Slugify();
            $corporativo->url = $slugify->slugify($corporativo->razon_social);
        });

        static::updating(function ($corporativo) {
            $slugify = new Slugify();
            $corporativo->url = $slugify->slugify($corporativo->razon_social);
        });
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
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
