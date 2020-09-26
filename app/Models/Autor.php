<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    //protected $timestamps =false; ->caso queira tirar um campo que é criado automaticamente

    protected $fillable = [
        'nome',
        'email'
    ];

    public function livros()
    {
        return $this->belongsToMany(Livro::class);
    }
}
