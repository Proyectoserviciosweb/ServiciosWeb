<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class post extends Model
{
    use HasFactory;

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    //metodo para relacionar de muchos a muchos
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_posts');
    }

    //relacion una a muchos polimorfica

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable');

    }
}
