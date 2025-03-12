<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'categoria_id',
        'crated_at',
        'updated_at'
    ];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Category::class);
    }
}
