<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Relationships Many to Many
        //metodo para relacionar de muchos a muchos

    public function posts()
    {
        return $this->belongsToMany(post::class, 'categoria_posts');
    }
}
