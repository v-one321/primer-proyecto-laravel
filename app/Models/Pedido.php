<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class , 'cliente_id');
    }
    public function pelicula(){
        return $this->belongsTo(Pelicula::class , 'pelicula_id');
    }
}
