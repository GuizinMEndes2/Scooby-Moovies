<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Categoria extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
    protected $fillable = [
        'movie_id',
        'categoria_id',
    ];
}
