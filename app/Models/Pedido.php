<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad',
        'fecha_entrega',
        'numero_pedido',
        'cliente_id',
        'producto_id',
        'total_pedido',
        'corporativo_id',
        'estado_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function producto()
    {
        return $this->belongsTo(Product::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
