<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion','creadorpor'];

    public function productos()
    {
        return $this->hasMany(Product::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creadopor');
    }
}
