<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class);
    }
}
