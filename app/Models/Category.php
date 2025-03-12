<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
