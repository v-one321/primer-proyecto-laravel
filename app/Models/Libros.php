<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    public function editorial123(){
        return $this->belongsTo(Editoriales::class , 'editorial_id');
    }
}
