<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'pedido_minimo',
    'imagen', 'corporativo_id','categoria_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}
