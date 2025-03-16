<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Article extends Model
{
    protected $table = 'articulos';

    protected $fillable = [
        'id',
        'titulo',
        'contenido',
        'imagen_destacada',
        'autor',
        'categoria_id',
        'crated_at',
        'updated_at'
    ];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación: Un artículo tiene muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comment::class, 'articulo_id');
    }
}
