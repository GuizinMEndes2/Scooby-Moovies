<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'm-categorias', 'categoria_id', 'movie_id');
    }
}
