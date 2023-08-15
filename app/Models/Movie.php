<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sinopse',
        'imagem',
        'link'
    ];

    public function categorias()
    {
        return $this->belongsToMany(Movie::class, 'm-categorias', 'movie_id', 'categoria_id');
    }
}
