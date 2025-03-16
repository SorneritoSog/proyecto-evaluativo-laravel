<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Article;

class Category extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'id',
        'tipo',
        'nombre',
        'descripcion',
        'crated_at',
        'updated_at'
    ];

    // Relación: Una categoría tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Product::class, 'categoria_id'); // Especifica la clave foránea si no sigue la convención
    }

    // Relación: Una categoría tiene muchos articulos
    public function articulos()
    {
        return $this->hasMany(Article::class, 'categoria_id'); // Especifica la clave foránea si no sigue la convención
    }
}
