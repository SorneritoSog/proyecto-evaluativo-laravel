<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Comment extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'id',
        'contenido',
        'nombre_usuario',
        'email',
        'articulo_id',
        'crated_at',
        'updated_at'
    ];

    // Relación con el artículo
    public function articulo()
    {
        return $this->belongsTo(Article::class);
    }
}
